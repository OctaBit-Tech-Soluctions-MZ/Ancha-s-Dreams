<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Content;
use App\Models\Course;
use App\Services\GoogleDriveService;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        $category = $request->categories;
        $orderBy = $request->order_by;

        if($search || $category || $orderBy){
            $courses = Course::where([
                ['name','like','%'. $search. '%'],
                //['categoria', $category]
            ])->when($orderBy, function ($query, $order_by) {
                $allowedColumns = ['name', 'created_at'];
                if (in_array($order_by, $allowedColumns)) {
                    return $query->orderBy($order_by);
                }
                return $query;
            })
            ->paginate(9);
        }else{
            $courses = Course::paginate(9);
        }

        $categories = Category::all('name');

        return view('courses',compact('courses','categories','search','category','orderBy',));
    }

    public function details($slug) {

        
        $course = Course::with('instructor')
                    ->where('slug', $slug)
                    ->first();

        return view('courses.details', compact('course'));
    }

    public function register(){
        $categories = Category::all('name');
        return view('courses.register',compact('categories'));
    }

    public function edit($slug) {

        $course = Course::where('slug', $slug)->firstOrFail();

        $categories = Category::all('name');

        return view('courses.edit', compact('course','categories'));
    }

    public function store(CourseRequest $request)
    {
        DB::beginTransaction();

        try {
            // Upload da imagem
            $imageName = $this->handleCoursePhotoUpload($request);

            // Criação da pasta no Google Drive
            $gds = new GoogleDriveService();
            $folderId = $gds->createFolder($request->name);
            // Criação do curso
            $course = Course::create([
                'name' => $request->name,
                'price' => $request->price,
                'nivel' => $request->nivel,
                'category' => $request->categories,
                'description' => $request->description,
                'course_photo_path' => $imageName,
                'teacher' => Auth::id(),
                'folder_id' => $folderId,
            ]);

            // Upload e criação do conteúdo de introdução
            $fileId = $this->uploadIntroVideo($request->file('intro_video'), $request->title_video, $folderId, $gds);

            Content::create([
                'title' => $request->title_video,
                'url_preview' => 'https://drive.google.com/file/d/' . $fileId . '/preview',
                'order' => 0,
                'duration' => "2:00", // ← ajustar futuramente com duração real
                'course_id' => $course->id,
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Curso registado com sucesso.');
            
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Erro ao salvar curso: ' . $e->getMessage());
        }
    }

    public function update(UpdateCourseRequest $request, $slug){

        $course = Course::where('slug', $slug)->firstOrFail();
        $course->name = $request->name;
        $course->price = $request->price;
        $course->category = $request->categories;
        $course->description = $request->description;
        $course->slug = Str::slug($course->name, '-');

        if($request->hasFile('course_photo') && $request->file('course_photo')->isValid()){

            if ($course->course_photo_path && file_exists(public_path('assets/img/courses/' . 
                                                        $course->course_photo_path))) {
                unlink(public_path('assets/img/courses/' . $course->course_photo_path));
            }
            $requestPhoto = $request->course_photo;
            $extension = $requestPhoto->extension();
            $imageName = md5($requestPhoto->getClientOriginalName(). strtotime("now"). ".". $extension);
            $requestPhoto->move(public_path('assets/img/courses'), $imageName);
            $course->course_photo_path = $imageName;
        }
        $course->save();
        return redirect(route('instructor.courses'))->with('success', 'Curso Actualizado com sucesso');
        
    }

    public function destroy($slug) {
        Course::where('slug',$slug)->firstOrFail()->delete();
        return redirect(route('instructor.courses'))->with('success', 'Curso Excluido com sucesso');
    }

    private function handleCoursePhotoUpload($request)
    {
        if (!$request->hasFile('course_photo')) {
            return 'default.png';
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $photo = $request->file('course_photo');
        $path = 'assets/img/courses';
        return UploadService::upload($photo, $path, 'default.png', $allowedExtensions);
    }

    private function uploadIntroVideo($video, $title, $folderId, $gds)
    {
        return $gds->uploadVideo($video->getPathname(), $title, $folderId)->id;
    }
}
