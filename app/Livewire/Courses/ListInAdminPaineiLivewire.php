<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin')]
class ListInAdminPaineiLivewire extends Component
{
    public function render()
    {
        $courses = Course::with('users')->paginate(10);
        return view('livewire.courses.list-in-admin-painei-livewire', compact('courses'));
    }

    public function publish($id, $value)
    {
        Course::findOrFail($id)->update([
            'published' => $value
        ]);
    }
}
