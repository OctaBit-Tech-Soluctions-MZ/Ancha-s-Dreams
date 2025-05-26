<?php

namespace App\Livewire\Exams;

use App\Models\Exam;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.instructor')]
class QuestionLivewire extends Component
{
    public $slug,
        $id,
        $answer = 'multichoice',
        $question,
        $options = [
            ['text' => '', 'correct' => false],
            ['text' => '', 'correct' => false],
        ],
        $exam, $correctIndex = null;

    public function addOption()
    {
        $this->options[] = ['text' => '', 'correct' => false];
    }
    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options); // reindexar para evitar buracos
    }

    public function mount($id)
    {
        $this->exam = Exam::with('courses')->findOrFail($id);
        $this->slug = $this->exam->courses->slug;
        $this->id = $id;
    }

    public function hasCorrect($value)
    {
        $this->correctIndex = $value;
        foreach ($this->options as $index => $option) {
            $this->options[$index]['correct'] = false;
        }
        $this->options[$value]['correct'] = true;
    }
    public function create()
    {
        $maxOrder = $this->exam->questions->max('order');
        $newOrder = $maxOrder ? $maxOrder + 1 : 1;
        $question = $this->exam->questions()->create([
            'question_text' => $this->question,
            'order'         => $newOrder
        ]);

        foreach ($this->options as $option) {
            $question->answers()->create([
                'answer_text' => $option['text'],
                'is_correct'  => $option['correct'],
            ]);
        }
        $this->reset('question', 'options');
        $this->options = [
            ['text' => '', 'correct' => false],
            ['text' => '', 'correct' => false],
        ];
    }

    public function render()
    {
        return view('livewire.exams.question-livewire');
    }
}
