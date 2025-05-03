<?php

namespace App\Livewire\Lesson;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.instructor')]
class ExamFinalLivewire extends Component
{
    public $answer = 0;
    public function render()
    {
        return view('livewire.lesson.exam-final-livewire');
    }

    public function answerType($value)
    {
        $this->answer = $value;
    }
}
