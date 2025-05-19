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
            'status'
    ];
}
