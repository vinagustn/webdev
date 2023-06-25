<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 100; $i++) { 
            DB::table('healths')->insert([
                'id_ternak' => $faker->numberBetween(1, 100),
                'diseas_hst' => $faker->text(),
                'treat_hst' => $faker->text()
            ]);
        }
    }
}
