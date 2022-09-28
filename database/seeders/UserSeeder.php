<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // for ($i = 0; $i < 5; $i++) {
            User::insert([
                "name" => $faker->name(),
                "phone" => $faker->phoneNumber,
                "email" => $faker->safeEmail,
                'photo'=> $faker->imageUrl($width = 400, $height = 400) ,
            ]);
        // }
    }
}
