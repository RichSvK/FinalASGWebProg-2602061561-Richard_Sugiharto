<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('12345678'),
                'gender' => $faker->randomElement(['male', 'female']),
                'mobile_number' => $faker->phoneNumber,
                'linkedin_profile' => 'https://www.linkedin.com/in/' . $faker->userName,
                'coin' => $faker->numberBetween(0, 1000),
                'birth_date' => $faker->dateTimeBetween('-50 years', '-20 years'),
            ]);
        }
    }
}
