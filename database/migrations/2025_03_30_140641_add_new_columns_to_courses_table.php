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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('views')
            ->default(0)
            ->after('teacher');
            $table->string('rating')
            ->default(0)
            ->after('views');
            $table->string('status')
            ->default('Em Lançamento')
            ->after('rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn('views');
            $table->dropColumn('rating');
            $table->dropColumn('status');
        });
    }
};
