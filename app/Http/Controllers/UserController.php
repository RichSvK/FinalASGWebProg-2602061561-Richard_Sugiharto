<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = User::join('avatar', 'users.avatar_profile', '=', 'avatar.id')
            ->select('users.*', 'avatar.avatar as avatar')
            ->where('users.id', Auth::id())
            ->first();
        return view('userProfile', compact('user'));
    }

    public function changeVisibility(Request $request){
        $user = Auth::user();

        switch ($user->visibility){
            case 'visible':
                $user->visibility = 'invisible';
                $user->coin -= 50;
                $randomBear = random_int(2, 4);
                $user->avatar_profile = $randomBear;
                break;

            case 'invisible':
                $user->visibility = 'visible';
                $user->coin -= 5;
                $user->avatar_profile = 1;
                break;
        }

        $user->save();

        session()->flash('message', 'Visibility changed to ' . $user->visibility);
        return redirect()->route('setting');
    }
}
