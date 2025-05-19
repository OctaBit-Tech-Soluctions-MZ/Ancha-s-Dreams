<?php

namespace App\Livewire\Exams;

use App\Models\Course;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.instructor')]
class RegisterLivewire extends Component
{
    public $slug;
    public $title;
    public $description;
    public $timelimit;
    public $passing;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required',
        'timelimit' => 'required',
        'passing' => 'required|numeric|max:20',
    ];

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        return view('livewire.exams.register-livewire');
    }

    public function create()
    {
        $this->validate();
        $course = Course::where('slug', $this->slug)->firstOrFail();
        $exam = $course->exams()->create([
            'title' => $this->title,
            'description' => $this->description,
            'time_limit' => $this->timelimit,
            'passing' => $this->passing
        ]);

        $this->reset('title', 'description', 'timelimit', 'passing');
        return redirect()->route('question.register', ['id' => $exam->id])->with('success', 'Exame Criado com sucesso');
    }
}
