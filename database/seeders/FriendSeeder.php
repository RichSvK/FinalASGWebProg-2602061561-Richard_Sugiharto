<?php

namespace Database\Seeders;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        foreach($users as $user){
            $friend_num = random_int(0, 3);
            for($i = 0; $i < $friend_num; $i++){
                $friend = $users->random();
                if($user->id !== $friend->id){
                    $check_friend = Friend::where('userId', $user->id)
                        ->where('friendId', $friend->id)
                        ->first();

                    if($check_friend == null){
                        Friend::create([
                            'userId' => $user->id,
                            'friendId' => $friend->id,
                        ]);

                        Friend::create([
                            'userId' => $friend->id,
                            'friendId' => $user->id,
                        ]);
                    }
                } else {
                    $i--;
                }
            }
        }
    }
}
