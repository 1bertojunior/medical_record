<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1,10) as $index) {
            DB::table('patients')->insert([
                'name' => $faker->name,
                'birth_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'cpf' => $faker->unique()->numerify('###########'),
                'phone' => $faker->phoneNumber,
                'sus_card' => $faker->numerify('######## #### #### ####'),
                'notes' => $faker->text($maxNbChars = 200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
