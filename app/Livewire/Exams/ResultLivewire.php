<?php

namespace App\Livewire\Exams;

use App\Models\ExamAttempt;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class ResultLivewire extends Component
{
    public $attempt;
    public function mount($attempt_id)
    {
        $this->attempt = ExamAttempt::with(['users', 'exams' => function ($query){
            $query->with('courses');
        }, 'examAnswers' => function ($query){
            $query->with('questions', 'answers');
        }])->find($attempt_id);
    }
    public function render()
    {
        return view('livewire.exams.result-livewire');
    }
}
