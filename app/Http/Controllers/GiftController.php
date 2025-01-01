<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use App\Models\UserAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiftController extends Controller
{
    public function givePage(User $user){
        if(Auth::id() == $user->id){
            return redirect()->route('home');
        }

        $avatars = Avatar::where('id', '>', 4)
            ->get();
        return view('avatarGift', compact('user', 'avatars'));
    }

    public function give(User $user, Avatar $avatar){
        $currentUser = Auth::user();
        if($currentUser->coin < $avatar->price){
            session()->flash('error', 'Insufficient coin');
            return redirect()->route('avatarGift', $user);
        }
        $currentUser->coin -= $avatar->price;
        $currentUser->save();

        $user_avatar = UserAvatar::where('userId', '=', $user->id)
            ->where('avatarId', '=', $avatar->id)
            ->first();

        if($user_avatar){
            $user->coin += $avatar->price;
            $user->save();
        } else{
            dd('test');
            UserAvatar::create([
                'userId' => $user->id,
                'avatarId' => $avatar->id,
            ]);
        }

        session()->flash('message', 'Avatar given successfully');
        return redirect()->route('home');
    }
}
