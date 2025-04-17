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
            $table->string('name');
            $table->text('description');
            $table->string('category');
            $table->double('price');
            $table->string('slug')->unique();
            $table->string('nivel');
            $table->integer('course_type');
            $table->string('duration_total');
            $table->boolean('certificate');
            $table->string('course_photo_path');
            $table->string('teacher');
            $table->string('folder_id')->unique()->nullable();
            $table->integer('views')->default(0);
            $table->double('rating')->default(0);
            $table->string('status')->default('inactivo');
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
