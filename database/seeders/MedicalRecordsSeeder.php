<?php

namespace Database\Seeders;

use App\Models\HealthcareProfessional;
use App\Models\MedicalRecord;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MedicalRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
        $faker = Faker::create();

        $patients = \App\Models\Patient::all();
        $professionals = \App\Models\HealthcareProfessional::all();

        foreach ($patients as $patient) {
            foreach ($professionals as $professional) {
                DB::table('medical_records')->insert([
                    'patient_id' => $patient->id,
                    'healthcare_professional_id' => $professional->id,
                    'image_path' => $faker->imageUrl(), // Exemplo de URL de imagem, ajuste conforme necessário
                    'chief_complaint' => $faker->sentence,
                    'history_of_present_illness' => $faker->paragraph,
                    'past_medical_history' => $faker->paragraph,
                    'family_history' => $faker->paragraph,
                    'physical_examination' => $faker->paragraph,
                    'diagnosis' => $faker->sentence,
                    'treatment_plan' => $faker->paragraph,
                    'medications' => $faker->sentence,
                    'follow_up_instructions' => $faker->paragraph,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

    }
}
