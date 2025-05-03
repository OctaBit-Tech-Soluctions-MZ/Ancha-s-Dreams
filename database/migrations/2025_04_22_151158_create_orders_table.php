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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user');
            $table->decimal('total', 10, 2);
            $table->enum('status',['pendente', 'concluido', 'cancelado', 'recusado'])->default('pendente');
            $table->enum('type', ['compra de curso', 'compra de livro digital', 'compra de livro fisico', 'compra de outros produtos']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
