<?php

namespace App\Http\Controllers;

use App\Helper\GenerateID;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use App\Services\GoogleDriveService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        return view('courses.courses_details', compact('course'));
    }

    public function watch(){
        return view('courses.courses_watch');
    }

    public function register(){
        $categories = Category::all('name');
        return view('instructor.register_course',compact('categories'));
    }

    public function moreInfo($slug){

        $course = Course::where('slug', $slug)->firstOrFail();

        return view('instructor.course_details', compact('course'));
    }

    public function edit($slug) {

        $course = Course::where('slug', $slug)->firstOrFail();

        $categories = Category::all('name');

        return view('instructor.edit_course', compact('course','categories'));
    }

    public function store(CourseRequest $request){

        if($request->hasFile('course_photo') && $request->file('course_photo')->isValid()){
            $requestPhoto = $request->course_photo;
            $extension = $requestPhoto->extension();
            $imageName = md5($requestPhoto->getClientOriginalName(). strtotime("now")). ".". $extension;
            $requestPhoto->move(public_path('assets/img/courses'), $imageName);
        } else {
            $imageName = 'noimage.png';
        }
        $gds = new GoogleDriveService();
        $course = new Course();
        $course->course_id = GenerateID::exists($course,'c',['min'=>10,'max'=>99],['min'=>100,'max'=>999]);
        $course->name = $request->name;
        $course->price = $request->price;
        $course->category = $request->categories;
        $course->description = $request->description;
        $course->course_photo_path = $imageName;
        $course->teacher = Auth::user()->id;
        $course->drive_folder_id = $gds->createFolder($request->name);
        $course->save();
        return redirect()->back()->with('success', 'Curso Registado com sucesso');
        
    }

    public function update(UpdateCourseRequest $request, $slug){

        $course = Course::where('slug', $slug)->firstOrFail();
        $course->name = $request->name;
        $course->price = $request->price;
        $course->categoria = $request->categories;
        $course->description = $request->description;

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
        return redirect()->back()->with('success', 'Curso Actualizado com sucesso');
        
    }

    public function destroy($slug) {
        Course::where('slug',$slug)->firstOrFail()->delete();
        return redirect(route('instructor.courses'))->with('success', 'Curso Excluido com sucesso');
    }
}
