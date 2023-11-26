<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthcareProfessional;

class HealthcareProfessionalsTableSeeder extends Seeder
{
    public function run()
    {
        $professionals = [
            ['name' => 'Dr. Fulano', 'document_number' => '123456', 'profession_type_id' => 1],
            ['name' => 'Enf. Beltrano', 'document_number' => '654321', 'profession_type_id' => 2],
        ];

        foreach ($professionals as $professional) {
            HealthcareProfessional::create($professional);
        }
    }
}
