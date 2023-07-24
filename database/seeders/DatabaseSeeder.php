<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Enum\EGender;
use App\Enum\EStatus;
use App\Enum\EUserStatus;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        DB::table('users')->insert([
            'name' => 'Superadmin',
            'username' => 'superadmin',
            'role' => 'superadmin',
            'status' => true,
            'password' => Hash::make('superadmin')
        ]);

        DB::table('users')->insert([
            'name' => 'Agus Setiawan',
            'username' => 'agus.setiawan',
            'role' => 'karyawan', 
            'status' => true,
            'password' => Hash::make('agussetiawan')
        ]);

        // for ($i = 1; $i <= 5; $i++) {
        //     DB::table('users')->insert([
        //         'name' => $faker->name,
        //         'username' => $faker->username,
        //         'password' => Hash::make('password'),
        //         'status' => rand(0, 1)
        //     ]);
        // }

        // for ($i = 1; $i <= 5; $i++) {
        //     DB::table('breedings')->insert([
        //         'gender' => $faker->randomElement(EGender::cases()),
        //         'umur' => $faker->randomDigit,
        //         'tinggi' => $faker->randomDigit,
        //         'panjang_bdn' => $faker->randomDigit,
        //         'lingkar' => $faker->randomDigit,
        //         'pj_telinga' => $faker->randomDigit
        //     ]);
        // }
    }
}
