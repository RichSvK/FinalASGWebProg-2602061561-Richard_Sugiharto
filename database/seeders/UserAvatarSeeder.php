<?php

namespace Database\Seeders;

use App\Models\Avatar;
use App\Models\User;
use App\Models\UserAvatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $avatars = Avatar::all();
        foreach ($users as $user) {
            $avatar_num = random_int(1, 3);
            for ($i = 0; $i < $avatar_num; $i++) {
                UserAvatar::create([
                    'userId' => $user->id,
                    'avatarId' => $avatars->random()->id,
                ]);
            }
        }
    }
}
