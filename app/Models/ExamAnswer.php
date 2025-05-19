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
}
