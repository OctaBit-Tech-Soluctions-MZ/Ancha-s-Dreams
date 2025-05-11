<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use App\Models\Recipe;
use Livewire\Component;

class DashboardLivewire extends Component
{
    public function render()
    {
        $courses = Course::where('user_id',auth()->user()->id)->get();
        $courses_list = $courses->take(5);
        $recipes = Recipe::count();
        return view('livewire.instructor.dashboard-livewire',
                        compact('courses', 'recipes', 'courses_list'))
                        ->layout('layouts.instructor');
    }
}
