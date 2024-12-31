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
            'bear_1.jpg',
            'bear_2.jpg',
            'bear_3.jpg',
            'dragon.jpg',
            'lion.jpg',
            'snake.jpg',
        ];

        foreach ($avatars as $avatar) {
            Avatar::create([
                'avatar' => $avatar,
            ]);
        }
    }
}
