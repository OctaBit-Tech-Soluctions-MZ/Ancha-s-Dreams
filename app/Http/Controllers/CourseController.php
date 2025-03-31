<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {

        $courses = Course::all();

        return view('courses', [
            'courses' => $courses,
        ]);
    }

    public function details($id) {

        
        $course = Course::with('instructor')
                    ->where('course_id', $id)
                    ->first();

        return view('courses.courses_details', ['course' => $course]);
    }

    public function watch(){
        return view('courses.courses_watch');
    }
}
