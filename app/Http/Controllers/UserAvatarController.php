<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use App\Models\User;
use App\Models\UserAvatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAvatarController extends Controller
{
    public function create(Request $request){
        $request->validate([
            'avatarId' => 'required|integer',
        ]);

        $user = Auth::user();
        $avatar = Avatar::where('id', '=', $request->avatarId)
            ->first();

        if($user->coin < $avatar->price){
            session()->flash('error', 'Insufficient coin');
            return redirect()->route('avatarPage');
        }

        UserAvatar::create([
            'userId' => $user->id,
            'avatarId' => $request->avatarId,
        ]);

        $user->coin -= $avatar->price;
        $user->avatar_profile = $request->avatarId;
        $user->save();

        session()->flash('message', 'Avatar purchased successfully');
        return redirect()->route('avatarPage');
    }

    public function equip(Request $request){
        $request->validate([
            'avatarId' => 'required|integer',
        ]);

        $user = Auth::user();

        if($user->visibility == 'invisible'){
            session()->flash('error', 'You cannot equip the avatar while invisible');
            return redirect()->route('setting');
        }
        $user->avatar_profile = $request->avatarId;
        $user->save();

        session()->flash('message', 'Avatar equipped successfully');
        return redirect()->route('avatarPage');
    }

    public function unequip(Request $request){
        $user = Auth::user();
        $user->avatar_profile = 1;
        $user->save();

        session()->flash('message', 'Avatar unequipped successfully');
        return redirect()->route('avatarPage');
    }
}
