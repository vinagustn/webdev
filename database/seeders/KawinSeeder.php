<?php

namespace Database\Seeders;

use App\Enum\EStatus;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KawinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 100; $i++) { 
            DB::table('marriages')->insert([
                'status' => $faker->randomElement(EStatus::cases()),
                'id_jantan' => $faker->numberBetween(1, 100),
                'id_betina' => $faker->numberBetween(1, 100),
                'tgl_kawin' => $faker->date,
            ]);
        }
    }
}
