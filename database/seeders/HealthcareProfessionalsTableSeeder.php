<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HealthcareProfessional;

class HealthcareProfessionalsTableSeeder extends Seeder
{
    public function run()
    {
        $professionals = [
            ['name' => 'Fulano', 'document_number' => '123456', 'profession_type_id' => 1],
            ['name' => 'Beltrano', 'document_number' => '654321', 'profession_type_id' => 2],
            ['name' => 'Sicrano', 'document_number' => '789012', 'profession_type_id' => 3],
            ['name' => 'Fulana', 'document_number' => '345678', 'profession_type_id' => 4],
            ['name' => 'Beltrana', 'document_number' => '901234', 'profession_type_id' => 5],
            ['name' => 'Sicrana', 'document_number' => '567890', 'profession_type_id' => 6],
            ['name' => 'Fulano', 'document_number' => '234567', 'profession_type_id' => 7],
        ];

        foreach ($professionals as $professional) {
            HealthcareProfessional::create($professional);
        }
    }
}
