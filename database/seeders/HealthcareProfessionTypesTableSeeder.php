<?php

namespace Database\Seeders;

use App\Models\HealthcareProfessionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HealthcareProfessionTypesTableSeeder extends Seeder
{
    public function run()
    {
        $professions = [
            ['name' => 'Médico', 'council_type' => 'CRM'],
            ['name' => 'Enfermeiro(a)', 'council_type' => 'COREN'],
            ['name' => 'Fisioterapeuta', 'council_type' => 'CREFITO'],
            ['name' => 'Psicólogo(a)', 'council_type' => 'CRP'],
            ['name' => 'Nutricionista', 'council_type' => 'CRN'],
            ['name' => 'Farmacêutico(a)', 'council_type' => 'CRF'],
            ['name' => 'Dentista', 'council_type' => 'CRO'],
            ['name' => 'Terapeuta Ocupacional', 'council_type' => 'CREFITO'],
            ['name' => 'Assistente Social', 'council_type' => 'CRESS'],
            ['name' => 'Radiologista', 'council_type' => 'CRTR'],
            ['name' => 'Bioquímico(a)', 'council_type' => 'CRBio'],
            ['name' => 'Fonoaudiólogo(a)', 'council_type' => 'CREFONO'],
            ['name' => 'Médico Veterinário', 'council_type' => 'CRMV'],
            ['name' => 'Optometrista', 'council_type' => 'CON'],
        ];

        foreach ($professions as $profession) {
            HealthcareProfessionType::create($profession);
        }
    }

}
