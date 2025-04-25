<?php

namespace App\Http\Controllers;

use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index() {
        return view('recipes');
    }

    public function list() {
        return view('instructor.recipes');
    }
}
