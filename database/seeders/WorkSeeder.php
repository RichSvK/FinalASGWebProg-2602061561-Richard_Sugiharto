<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Work;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $faker = Factory::create('id_ID');
        foreach ($users as $user) {
            $num_work = random_int(3, 4);
            for ($i = 0; $i < $num_work; $i++) {
                Work::create([
                    'userId' => $user->id,
                    'work' => $faker->jobTitle,
                ]);
            }
        }
    }
}
