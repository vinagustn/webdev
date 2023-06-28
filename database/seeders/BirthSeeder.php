<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BirthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 5; $i++) { 
            DB::table('births')->insert([
                'id_kawin' => $faker->numberBetween(1, 5),
                'tgl_lahir' => $faker->dateTimeThisYear(),
                'jml_anak' => $faker->numberBetween(1,4),
                'id_anak' => $faker->numerify(4),
                'gender_anak' => $faker->numerify(10),
            ]);
        }
    }
}
