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
            $table->string('cover');
            $table->text('description');
            $table->string('url')->nullable();
            $table->string('author');
            $table->double('price');
            $table->integer('qtd')->nullable();
            $table->boolean('is_digital')->default(1);
            $table->enum('status',['pendente', 'processando', 'concluido', 'falhou'])
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
