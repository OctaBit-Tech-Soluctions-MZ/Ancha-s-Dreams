<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Jobs\JobSendEmail;
use App\Models\Book;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{

    public function index() {
        $users = User::where([
            ['id', '<>', Auth::user()->id],
            ['role', 'admin'],
            ])->paginate(10);
        $search = '';
        return view('admin.users', compact('users', 'search'));
    }

    public function dashboard() {
        $students = User::where('role', 'student')->count();
        $instructors = User::where('role', 'instructor')->count();
        $courses = Course::count();
        $books = Book::count();
        return view('admin.dashboard', compact('students','instructors', 'courses','books'));
    }

    public function courses() {
        $search = '';
        $courses = Course::with('instructor')->paginate(5);
        $categories = Category::all();
        return view('admin.courses', compact('courses', 'categories', 'search'));
    }

    public function instructor() {
        $search = '';
        $users = User::where([
            ['id', '<>', Auth::user()->id],
            ['role', 'instructor'],
            ])->paginate(10);
        return view('admin.instructors', compact('users', 'search'));
    }

    public function books(Request $request){

        $search = $request->search;
        $category = $request->categories;
        $order_by = $request->order_by;

        if($search || $category || $order_by){
            $books = Book::when($search, function ($query, $search) {
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
            $books = Book::paginate(5);
        }
        $categories = Category::all('name');
        return view('admin.books',compact('books','search','categories','order_by','category'));
    }

    public function register() {
        return view('admin.user.register');
    }

    public function edit($slug) {
        $user = User::where('slug',$slug)->firstOrFail();
        return view('admin.user.edit', compact('user'));
    }

    public function store(UserRequest $request) {
        $user = new User();
        $password = strtolower(Str::slug($request->name)).'-'.rand(1000, 9999);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->phone_number = $request->phone_number;
        $user->role = 'admin';
        $user->save();
        JobSendEmail::dispatch($user,$password);
        return redirect()->back()->with('success','Administrador Criado com Sucesso');
    }
}
