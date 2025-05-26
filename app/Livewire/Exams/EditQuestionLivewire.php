<?php

namespace App\Livewire\Exams;

use App\Models\Question;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.instructor')]
class EditQuestionLivewire extends Component
{
    public $questionId;
    public $question;
    public $options = [];
    public $correctIndex;
    public $question_model;

    public function mount($id)
    {
        $this->question_model = Question::with(['answers', 'exams' => function ($query){
            $query->with('courses');
        }])->findOrFail($id);
        $this->questionId = $this->question_model->id;
        $this->question = $this->question_model->question_text;
        $this->options = $this->question_model->answers->map(function ($answer) {
            return [
                'text' => $answer->answer_text,
            ];
        })->toArray();
        $this->correctIndex = $this->question_model->answers->search(fn ($a) => $a->is_correct);
    }

    public function hasCorrect($value)
    {
        $this->correctIndex = $value;
        foreach ($this->options as $index => $option) {
            $this->options[$index]['correct'] = false;
        }
        $this->options[$value]['correct'] = true;
    }

    public function update()
    {
        $question = Question::findOrFail($this->questionId);
        $question->update([
            'question_text' => $this->question,
        ]);

        $question->answers()->delete(); // Simples e seguro para update

        foreach ($this->options as $index => $option) {
            $question->answers()->create([
                'answer_text' => $option['text'],
                'is_correct' => $index == $this->correctIndex,
            ]);
        }

        session()->flash('success', 'Questão atualizada com sucesso.');
    }

    public function addOption()
    {
        $this->options[] = ['text' => '', 'correct' => false];
    }
    
    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options); // reindexar para evitar buracos
    }
    
    public function render()
    {
        return view('livewire.exams.edit-question-livewire');
    }
}
