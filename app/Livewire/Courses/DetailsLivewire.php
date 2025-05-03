<?php

namespace App\Livewire\Courses;

use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class DetailsLivewire extends Component
{
    public $slug;

    public function mount($slug) {
        $this->$slug = $slug;
    }

    public function render()
    {
        // Carrega o curso com o instrutor
        $course = Course::with(['instructor' => function($query) {
            $query->withCount('courses');
        }])->where('slug', $this->slug)
        ->firstOrFail();
        // Obtém os cursos do mesmo instrutor, excluindo o curso atual
        $recommendedCourses = Course::where('user_id', $course->user_id)
                            ->where('slug', '!=', $this->slug)  // Exclui o curso atual
                            ->take(2)  // Limita a 2 cursos recomendados
                            ->get();
        $totalCourses = Course::where('user_id', $course->instructor->id)->count();
        return view('livewire.courses.details-livewire',compact('course', 'recommendedCourses', 'totalCourses'));
    }
}
