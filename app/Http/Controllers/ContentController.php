<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index($slug){
        return view('courses.contents.lesson',['slug' => $slug]);
    }
    public function add($slug){
        return view('courses.contents.add_lesson', ['slug' => $slug]);
    }
}
