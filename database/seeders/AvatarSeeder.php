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
        $avatarsData = [
            ['name' => 'Default', 'avatar' => 'default.jpg', 'price' => 0],
            ['name' => 'Bear 1', 'avatar' => 'bear_1.jpg', 'price' => 0],
            ['name' => 'Bear 2', 'avatar' => 'bear_2.jpg', 'price' => 0],
            ['name' => 'Bear 3', 'avatar' => 'bear_3.jpg', 'price' => 0],
            ['name' => 'Snake', 'avatar' => 'snake.jpg', 'price' => 50],
            ['name' => 'Lion', 'avatar' => 'lion.jpg', 'price' => 75000],
            ['name' => 'Dragon', 'avatar' => 'dragon.jpg', 'price' => 100000],
        ];

        foreach ($avatarsData as $data) {
            Avatar::create($data);
        }
    }
}
