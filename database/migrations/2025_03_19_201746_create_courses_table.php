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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_id')->unique();
            $table->string('name');
            $table->text('description');
            $table->string('category');
            $table->double('price');
            $table->string('course_photo_path');
            $table->string('teacher');
            $table->integer('views')->default(0);
            $table->double('rating')->default(0);
            $table->string('status')->default('Em Lançamento');
            $table->string('drive_folder_id')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
