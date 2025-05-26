<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamAttempt extends Model
{
    protected $fillable = [
            'user_id',
            'exam_id',
            'started_at', // ou salvar antes se quiser registrar início real
            'finished_at',
            'score',
            'status'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function exams()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

    public function examAnswers()
    {
        return $this->hasMany(ExamAnswer::class);
    }
}
