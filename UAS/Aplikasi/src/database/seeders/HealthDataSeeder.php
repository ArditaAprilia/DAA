<?php

namespace Database\Seeders;

use App\Models\HealthData;
use App\Models\User;
use Illuminate\Database\Seeder;

class HealthDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengambil data pengguna yang berperan sebagai atlet
        $athletes = User::where('role', 'atlet')->get();

        // Melakukan seeding data kesehatan untuk setiap atlet
        foreach ($athletes as $athlete) {
            HealthData::factory()->create([
                'user_id' => $athlete->id,
                'heart_rate' => rand(60, 100), // Detak jantung acak antara 60 dan 100
                'step_count' => rand(8000, 15000), // Langkah acak antara 8000 dan 15000
                'oxygen_level' => rand(95, 100), // Kadar oksigen acak antara 95% dan 100%
                'sleep_duration' => rand(6, 9), // Durasi tidur acak antara 6 dan 9 jam
                'weight' => rand(60, 85), // Berat badan acak antara 60 kg dan 85 kg
                'height' => rand(160, 190), // Tinggi badan acak antara 160 cm dan 190 cm
            ]);
        }
    }
}
