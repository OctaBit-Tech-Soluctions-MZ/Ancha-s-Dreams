<?php

namespace App\Livewire\Exams;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\ExamAnswer;
use App\Models\ExamAttempt;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app', ['headerBg' => 'bg-dark text-white'])]
class MakeLivewire extends Component
{
    public $exam,
        $options = [],
        $cont = 0;

    public function mount($id)
    {
        $this->exam = Exam::with(['questions' => function ($query) {
            $query->with('answers');
        }])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.exams.make-livewire');
    }

    public function setOption($id, $contOption)
    {
        $this->options[$contOption] = $id;
    }

    public function save()
    {
        $user = Auth::user();

        // 1. Criar tentativa de exame
        $attempt = ExamAttempt::create([
            'user_id'    => $user->id,
            'exam_id'    => $this->exam->id,
            'started_at' => now(), // ou salvar antes se quiser registrar início real
            'finished_at' => now(),
            'status'     => 'completed',
        ]);

        $score = 0;
        $totalQuestions = $this->exam->questions->count();

        // 2. Salvar cada resposta
        foreach ($this->options as $index => $answerId) {
            $answer = Answer::find($answerId); // Pega a resposta selecionada

            if (!$answer) continue; // Evita erro se a resposta não existir

            $isCorrect = $answer->is_correct;

            // Contabiliza a pontuação
            if ($isCorrect) {
                $score++;
            }

            ExamAnswer::create([
                'exam_attempt_id' => $attempt->id,
                'question_id'     => $answer->question_id,
                'answer_id'       => $answer->id,
                'is_correct'      => $isCorrect,
            ]);
        }

        // 3. Atualizar pontuação final
        $attempt->update([
            'score' => $score,
        ]);

        // 4. Opcional: redirecionar com feedback
        session()->flash('success', 'Exame submetido com sucesso! Você acertou ' . $score . ' de ' . $totalQuestions . '.');

        // return redirect()->route('exams.result', ['id' => $this->exam->id]);
    }
}
