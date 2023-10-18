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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pertemuan_id')
                  ->constrained('pertemuan');
            $table->foreignId('user_id')
                  ->constrained('users');
            $table->integer('jumlah_soal');
            $table->string('soal',9999);
            $table->string('jumlah_benar')->nullable();
            $table->string('jumlah_salah')->nullable();
            $table->integer('nilai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
