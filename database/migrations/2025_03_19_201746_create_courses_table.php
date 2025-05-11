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
            $table->double('price');
            $table->string('slug')->unique();
            $table->boolean('certificate')->default(1);
            $table->string('cover');
            $table->unsignedBigInteger('user_id');
            $table->string('folder_id')->unique()->nullable();
            $table->integer('views')->default(0);
            $table->double('rating')->default(0);
            $table->string('status')->default('inactivo');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
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
