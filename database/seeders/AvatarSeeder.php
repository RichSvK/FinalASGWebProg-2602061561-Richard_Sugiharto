<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $avatars = [
            'avatar_1.png',
            'avatar_2.png',
            'avatar_3.png',
        ];

        foreach ($avatars as $avatar) {
            Avatar::create([
                'avatar' => $avatar,
            ]);
        }
    }
}
