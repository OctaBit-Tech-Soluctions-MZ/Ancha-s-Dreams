<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard() {
        $students = User::where('role', 'student')->count();
        $instructors = User::where('role', 'instructor')->count();
        $courses = Course::count();
        return view('admin.dashboard', compact('students','instructors', 'courses'));
    }

    public function courses() {
        $courses = Course::with('instructor')->paginate(5);
        $categories = Category::all();
        return view('admin.courses', compact('courses', 'categories'));
    }

    public function users() {
        $users = User::where([
            ['id', '<>', Auth::user()->id],
            ['role', 'admin'],
            ])->paginate(10);
        $search = '';
        return view('admin.users', compact('users', 'search'));
    }

    public function instructor() {
        $search = '';
        $users = User::where([
            ['id', '<>', Auth::user()->id],
            ['role', 'instructor'],
            ])->paginate(10);
        return view('admin.instructors', compact('users', 'search'));
    }

    public function registerInstructor() {
        return view('admin.register_instructor');
    }
    public function registerUser() {
        return view('admin.register_admin');
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('admin.edit_user', compact('user'));
    }
}
