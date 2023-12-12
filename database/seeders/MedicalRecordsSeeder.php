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
                    'file_path' => $faker->imageUrl(), // Exemplo de URL de image
                    'complaints' => $faker->sentence, // Queixa doença
                    'disease_history' => $faker->paragraph, // Histórico de doenças
                    'allergies' => $faker->sentence, // Alergias
                    'diagnosis' => $faker->sentence, // Diagnóstico
                    'follow_up_instructions' => $faker->paragraph, // Instruções de acompanhamento
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        

    }
}
