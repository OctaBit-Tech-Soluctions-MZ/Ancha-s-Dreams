<?php

namespace App\Http\Controllers;

use App\Helper\GenerateID;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(Request $request) {
        $search = $request->search;
        $category = $request->categories;
        $order_by = $request->order_by;

        if($search || $category || $order_by){
            $courses = Course::where([
                ['name','like','%'. $search. '%'],
                //['categoria', $category]
            ])->when($order_by, function ($query, $orderBy) {
                $allowedColumns = ['name', 'created_at'];
                if (in_array($orderBy, $allowedColumns)) {
                    return $query->orderBy($orderBy);
                }
                return $query;
            })
            ->paginate(12);
        }else{
            $courses = Course::paginate(12);
        }

        $categories = Category::all('name');

        return view('courses', [
            'courses'    => $courses,
            'categories' => $categories,
            'search'     => $search,
            'category'   => $category,
            'orderBy'    => $order_by,
        ]);
    }

    public function details($slug) {

        
        $course = Course::with('instructor')
                    ->where('slug', $slug)
                    ->first();

        return view('courses.courses_details', ['course' => $course]);
    }

    public function watch(){
        return view('courses.courses_watch');
    }

    public function register(){
        $categories = Category::all('name');
        return view('courses.register_course',['categories' => $categories]);
    }

    public function my_courses(Request $request){

        $search = $request->search;
        $category = $request->categories;
        $order_by = $request->order_by;

        if($search || $category || $order_by){
            $courses = Course::with('instructor')
                    ->where('teacher', Auth::id())
                    ->when($search, function ($query, $search) {
                        return $query->where([
                            ['name', 'like', '%'.$search.'%'],
                            //['categoria', $category]
                        ]);
                    })
                    ->when($request->order_by, function ($query, $orderBy) {
                        $allowedColumns = ['name', 'created_at'];
                        if (in_array($orderBy, $allowedColumns)) {
                            return $query->orderBy($orderBy);
                        }
                        return $query;
                    })
                    ->paginate(5);
        }else {
            $courses = Course::with('instructor')
                    ->where('teacher', Auth::user()->id)
                    ->paginate(5);
        }

        $categories = Category::all('name');

        return view('courses.manage_course', [
            'courses'    => $courses,
            'categories' => $categories,
            'search'     => $search,
            'category'   => $category,
            'orderBy'    => $order_by,
        ]);
    }

    public function detailsProfile($slug){

        $course = Course::where('slug', $slug)->firstOrFail();

        return view('courses.course_details_profile', ['course' => $course]);
    }

    public function edit($slug) {

        $course = Course::where('slug', $slug)->firstOrFail();

        $categories = Category::all('name');

        return view('courses.edit_course', [
                                            'course' => $course,
                                            'categories' => $categories
                                        ]);
    }

    public function store(CourseRequest $request){

        if($request->hasFile('course_photo') && $request->file('course_photo')->isValid()){

            $requestPhoto = $request->course_photo;
            $extension = $requestPhoto->extension();
            $imageName = md5($requestPhoto->getClientOriginalName(). strtotime("now"). ".". $extension);
            $requestPhoto->move(public_path('assets/img/courses'), $imageName);

        } else {
            $imageName = 'noimage.png';
        }

        $course = new Course();

        $course->course_id = GenerateID::exists($course, 'c', ['min' => 10,'max' => 99],
                                                              ['min'=> 100, 'max'=> 999]);
        $course->name = $request->name;
        $course->price = $request->price;
        $course->categoria = $request->categories;
        $course->description = $request->description;
        $course->course_photo_path = $imageName;
        $course->teacher = Auth::user()->id;
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
        return redirect(route('profile.courses'))->with('success', 'Curso Excluido com sucesso');
    }
}
