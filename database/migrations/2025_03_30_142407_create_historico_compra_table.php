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
        Schema::create('historico_compra', function (Blueprint $table) {
            $table->id();
            $table->string('historic_id')->unique();
            $table->integer('user');
            $table->string('product');
            $table->integer('payment_meth');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_compra');
    }
};
