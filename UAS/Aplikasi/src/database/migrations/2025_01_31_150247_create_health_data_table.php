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
        // Tabel pengguna
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role'); // Role seperti 'admin', 'pelatih', 'atlet'
            $table->timestamps();
        });

        // Tabel data kesehatan dan kebugaran
        Schema::create('health_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('heart_rate'); // Detak jantung
            $table->integer('step_count'); // Jumlah langkah
            $table->float('oxygen_level'); // Kadar oksigen
            $table->integer('sleep_duration'); // Durasi tidur dalam jam
            $table->float('weight'); // Berat badan
            $table->float('height'); // Tinggi badan
            $table->timestamps();
        });

        // Tabel latihan
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('exercise_name'); // Nama latihan
            $table->integer('duration'); // Durasi latihan dalam menit
            $table->integer('intensity'); // Intensitas latihan
            $table->timestamps();
        });

        // Tabel umpan balik dari pelatih
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('trainer_id')->constrained('users')->onDelete('cascade'); // Pelatih yang memberikan umpan balik
            $table->text('feedback'); // Umpan balik terkait latihan atau kesehatan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
        Schema::dropIfExists('trainings');
        Schema::dropIfExists('health_data');
        Schema::dropIfExists('users');
    }
};
