<?php

namespace App\Livewire\Exams;

use App\Models\Exam;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.instructor')]
class EditLivewire extends Component
{
    public $title;
    public $description;
    public $timelimit;
    public $passing;
    public $exam;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required',
        'timelimit' => 'required',
        'passing' => 'required|numeric|max:20',
    ];

    public function mount($id)
    {
        $this->exam = Exam::with('courses')->findOrFail($id);
        $this->title = $this->exam->title;
        $this->description = $this->exam->description;
        $this->timelimit = $this->exam->time_limit;
        $this->passing = $this->exam->passing;
    }

    public function render()
    {
        return view('livewire.exams.edit-livewire');
    }

    public function update()
    {
        $this->validate();
        $this->exam->update([
            'title' => $this->title,
            'description' => $this->description,
            'time_limit' => $this->timelimit,
            'passing' => $this->passing
        ]);

        return request()->session()->flash('success', 'Exame Editado com sucesso');
    }
}
