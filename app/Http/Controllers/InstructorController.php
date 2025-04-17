<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class InstructorController extends Controller
{
    public function dashboard() {
        $courses = Course::where('teacher',Auth::user()->id)->count();
        return view('instructor.dashboard', compact('courses'));
    }

    public function courses(Request $request){

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

        return view('instructor.courses', [
            'courses'    => $courses,
            'categories' => $categories,
            'search'     => $search,
            'category'   => $category,
            'orderBy'    => $order_by,
        ]);
        
    }

    public function register() {
        $categories = Category::all('name');
        return view('admin.instructor.register', compact('categories'));
    }

    public function edit($slug) {
        $user = User::where('slug',$slug)->firstOrFail();
        $categories = Category::all('name');
        return view('admin.instructor.edit', compact('user', 'categories'));
    }

    public function store(UserRequest $request) {

        $user = new User();
        $password = strtolower(Str::slug($request->name)).'-'.rand(1000, 9999);
        $email = $request->email;
        $name = $request->name;
        $role = 'Instrutor';
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->password = Hash::make($password);
        $user->role = 'instructor';
        $user->phone_number = $request->phone_number;
        $user->biography = $request->biography;
        $user->specialty = $request->specialty;
        $user->experience = $request->experience;
        $user->certificate = $request->certificate;
        $user->save();

        Mail::send('emails.account', compact('password','email', 'name', 'role'), 
            function ($message) use($user){
                $message->to($user->email, $user->name.' '.$user->surname)
                        ->subject('Acesso à Plataforma de Culinária');
        });

        return redirect()->back()->with('success','Instructor Registado com sucesso');
    }

    public function update(UpdateUserRequest $request, $slug) {
        $user = User::where('slug', $slug)->firstOrFail();
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->biography = $request->biography;
        $user->specialty = $request->specialty;
        $user->experience = $request->experience;
        $user->certificate = $request->certificate;
        $user->save();
        return redirect()->back()->with('success','Dados do Instructor '. $request->name .' Editados com sucesso');
    }
}
