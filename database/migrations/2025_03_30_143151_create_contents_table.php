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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_id')->nullable();
            $table->string('duration')->nullable();
            $table->integer('order');
            $table->string('url_preview')->nullable();
            $table->string('url_view')->nullable();
            $table->string('url_download')->nullable();
            $table->string('slug')->unique();
            $table->string('course_id');
            $table->enum('video_status',['pendente', 'processando', 'concluido', 'falhou'])
                  ->default('pendente');
            $table->double('rating')->default(0);
            $table->integer('views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
