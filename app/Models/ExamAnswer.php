<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    protected $fillable = [
                'exam_attempt_id',
                'question_id',
                'answer_id',
                'is_correct'
    ];

    public function attempts()
    {
        return $this->belongsTo(ExamAttempt::class);
    }

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }

    public function answers()
    {
        return $this->belongsTo(Answer::class);
    }
}
