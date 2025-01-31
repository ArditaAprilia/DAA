<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\HealthData;
use App\Models\Training;
use App\Models\Feedback;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menambahkan Admin
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => 'admin',
        ]);
        $admin->assignRole('super_admin');

        // Menambahkan Pelatih
        $trainer = User::factory()->create([
            'name' => 'Pelatih A',
            'email' => 'pelatih@fitlife.com',
            'role' => 'pelatih',
        ]);
        $trainer->assignRole('trainer');

        // Menambahkan Atlet
        $athlete1 = User::factory()->create([
            'name' => 'Atlet 1',
            'email' => 'atlet1@fitlife.com',
            'role' => 'atlet',
        ]);
        $athlete1->assignRole('athlete');

        // Menambahkan data kesehatan untuk Atlet 1
        HealthData::factory()->create([
            'user_id' => $athlete1->id,
            'heart_rate' => 75,
            'step_count' => 12000,
            'oxygen_level' => 98.5,
            'sleep_duration' => 7,
            'weight' => 70.5,
            'height' => 175,
        ]);

        // Menambahkan data latihan untuk Atlet 1
        Training::factory()->create([
            'user_id' => $athlete1->id,
            'exercise_name' => 'Lari',
            'duration' => 45, // Durasi dalam menit
            'intensity' => 8, // Skala 1-10
        ]);

        // Memberikan umpan balik dari Pelatih ke Atlet 1
        Feedback::factory()->create([
            'user_id' => $athlete1->id,
            'trainer_id' => $trainer->id,
            'feedback' => 'Latihan yang sangat baik, tetap pertahankan intensitasnya.',
        ]);

        // Menambahkan Atlet 2
        $athlete2 = User::factory()->create([
            'name' => 'Atlet 2',
            'email' => 'atlet2@fitlife.com',
            'role' => 'atlet',
        ]);
        $athlete2->assignRole('athlete');

        // Menambahkan data kesehatan untuk Atlet 2
        HealthData::factory()->create([
            'user_id' => $athlete2->id,
            'heart_rate' => 80,
            'step_count' => 10000,
            'oxygen_level' => 97.8,
            'sleep_duration' => 8,
            'weight' => 68.0,
            'height' => 180,
        ]);

        // Menambahkan data latihan untuk Atlet 2
        Training::factory()->create([
            'user_id' => $athlete2->id,
            'exercise_name' => 'Angkat Beban',
            'duration' => 60, // Durasi dalam menit
            'intensity' => 7, // Skala 1-10
        ]);

        // Memberikan umpan balik dari Pelatih ke Atlet 2
        Feedback::factory()->create([
            'user_id' => $athlete2->id,
            'trainer_id' => $trainer->id,
            'feedback' => 'Perbaiki teknik angkat beban agar lebih efisien.',
        ]);
    }
}
