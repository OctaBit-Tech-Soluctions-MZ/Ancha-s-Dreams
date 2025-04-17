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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->after('name');
            $table->string('role')->after('profile_photo_path');
            $table->string('phone_number')->after('role');
            $table->string('nivel')->after('phone_number')->default('iniciante')->nullable();
            // dados do instrutor
            $table->longText('biography')->after('nivel')->nullable();
            $table->string('specialty')->after('biography')->nullable();
            $table->integer('experience')->after('specialty')->nullable();
            $table->longText('certificate')->after('experience')->nullable();
            $table->string('status')->after('certificate')->nullable()->default('activo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('role');
            $table->dropColumn('cellnumber');
            $table->dropColumn('nivel');
            // dados do instrutor
            $table->dropColumn('biograph');
            $table->dropColumn('speciality');
            $table->dropColumn('anos_experience');
            $table->dropColumn('certificate');
            $table->dropColumn('status');
        });
    }
};
