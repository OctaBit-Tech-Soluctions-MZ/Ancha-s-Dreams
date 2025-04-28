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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image_path');
            $table->text('description');
            $table->string('pdf_book_url')->nullable();
            $table->string('author');
            $table->boolean('associate_course')->default(0);
            $table->integer('course_id')->nullable();
            $table->integer('create_by');
            $table->double('price');
            $table->boolean('is_digital')->default(1);
            $table->enum('book_status',['pendente', 'processando', 'concluido', 'falhou'])
                  ->default('pendente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
