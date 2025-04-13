<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorController extends Controller
{
    public function dashboard() {
        $courses = Course::where('teacher',Auth::user()->id)->count();
        return view('instructor.dashboard', compact('courses'));
    }

    public function books() {
        return view('instructor.books');
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
}
