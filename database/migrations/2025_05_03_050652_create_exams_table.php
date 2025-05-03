<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('time_limit')->comment('Ex: 30min, 1h'); 
            $table->double('passing')->comment('Pontuação minima para passar no exame');
            $table->enum('status', ['draft', 'published', 'closed'])->default('draft');
            $table->integer('attempts_allowed')->default(1);
            $table->boolean('is_public')->default(false);
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id');
            $table->string('question');
            $table->enum('answer_type', ['multipla escolha', 'verdadeiro ou falso']);
            $table->integer('points')->default(1);
            $table->integer('order')->default(0);
            $table->timestamps();
        
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->string('answer');
            $table->boolean('is_correct')->default(false);
            $table->text('explanation')->nullable(); 
            $table->timestamps();
        
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
        });

        Schema::create('exam_attempts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('exam_id');
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
            $table->integer('score')->nullable(); // Pontuação final
            $table->enum('status', ['in_progress', 'completed', 'timeout'])->default('in_progress');
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
        });
        
        Schema::create('exam_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_attempt_id');
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('answer_id')->nullable(); // Para múltipla escolha
            $table->boolean('is_correct')->nullable(); // Pode ser calculado após envio
            $table->timestamps();

            $table->foreign('exam_attempt_id')->references('id')->on('exam_attempts')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('set null');
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('exam_attempts');
        Schema::dropIfExists('exam_answers');
    }
};
