<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index() {
        return view('courses');
    }

    public function details() {
        return view('courses_details');
    }

    public function watch(){
        return view('courses_watch');
    }
}
