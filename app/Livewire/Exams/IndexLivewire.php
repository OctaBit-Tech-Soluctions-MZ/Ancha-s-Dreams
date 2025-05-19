<?php

namespace App\Livewire\Exams;

use App\Models\Course;
use App\Models\Exam;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.instructor')]
class IndexLivewire extends Component
{
    public $exam,
        $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
        $course = Course::where('slug', $slug)->first();
        $this->exam = Exam::with(['questions' => function ($query){
            $query->with('answers');
        }])->where('course_id', $course->id)->first();
    }

    public function hasPublished($value)
    {
        $this->exam->update([
            'status' => $value
        ]);
    }

    public function render()
    {
        return view('livewire.exams.index-livewire');
    }
}
