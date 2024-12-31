<?php

namespace App\Http\Controllers;

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
        UserAvatar::create([
            'userId' => $user->id,
            'avatarId' => $request->avatarId,
        ]);

        session()->flash('message', 'Avatar purchased successfully');
        return redirect()->route('avatarPage');
    }

    public function equip(Request $request){
        $request->validate([
            'avatarId' => 'required|integer',
        ]);

        $user = Auth::user();
        $user->avatar_profile = $request->avatarId;
        $user->save();

        session()->flash('message', 'Avatar equipped successfully');
        return redirect()->route('avatarPage');
    }
}
