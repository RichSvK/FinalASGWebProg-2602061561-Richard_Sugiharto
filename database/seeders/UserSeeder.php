<?php

namespace Database\Seeders;

use App\Models\Avatar;
use App\Models\User;
use App\Models\UserAvatar;
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
        $avatars = Avatar::all();
        for ($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('12345678'),
                'gender' => $faker->randomElement(['Male', 'Female']),
                'mobile_number' => $faker->phoneNumber,
                'linkedin_profile' => 'https://www.linkedin.com/in/' . $faker->userName,
                'coin' => $faker->numberBetween(0, 1000),
                'birth_date' => $faker->dateTimeBetween('-50 years', '-20 years'),
                'avatar_profile' => 1,
            ]);

            // Default avatar
            UserAvatar::create([
                'userId' => $user->id,
                'avatarId' => $avatars[0]->id,
            ]);

            // Random Avatar
            $avatar_num = random_int(1, 3);
            for ($j = 0; $j < $avatar_num; $j++) {
                UserAvatar::create([
                    'userId' => $user->id,
                    'avatarId' => $avatars[$j + 4]->id,
                ]);
            }

            // Random Avatar Profile
            $user->update(['avatar_profile' => $avatar_num + 4]);
        }
    }
}
