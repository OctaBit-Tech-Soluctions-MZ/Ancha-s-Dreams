<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.instructor')]
class DashboardLivewire extends Component
{
    public $courses, $courses_list, $uniqueStudentCount;

    public function mount()
    {
        $this->courses = Course::with('myCourses.users')
            ->where('user_id', auth()->id())
            ->get();

        // Contar alunos únicos
        $this->uniqueStudentCount = $this->courses
            ->flatMap(fn($course) => $course->myCourses->pluck('user_id'))
            ->unique()
            ->count();

        $this->courses_list = $this->courses->take(5);
    }
    public function render()
    {
        return view('livewire.instructor.dashboard-livewire');
    }
}
