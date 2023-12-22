<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@amigosdacomunidade.org',
            'password' => Hash::make('Amigos@2016'),
        ]);
        DB::table('users')->insert([
            'name' => 'Humberto',
            'email' => 'hjunior854@gmail.com',
            'password' => Hash::make('Key@2023'),
        ]);

    }
}
