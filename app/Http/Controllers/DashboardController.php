<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $students = User::where('role', 2)->count();
        $instructors = User::where('role', 3)->count();
        $courses = Course::count();
        return view('admin.dashboard', compact('students','instructors', 'courses'));
    }

    public function courses() {
        $courses = Course::with('instructor')->paginate(5);
        $categories = Category::all();
        return view('admin.courses', compact('courses', 'categories'));
    }

    public function users() {
        $users = User::where('id',Auth::user()->id)->with('role')->get();
        return view('admin.users', compact('users'));
    }
}
