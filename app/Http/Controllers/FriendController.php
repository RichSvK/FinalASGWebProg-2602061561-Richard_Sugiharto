<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    public function index(){
        $users = User::join('friend', 'friend.friendId', '=', 'users.id')
            ->join('avatar', 'users.avatar_profile', '=', 'avatar.id')
            ->where('friend.userId', '=', Auth::id())
            ->where('users.visibility', '=', 'visible')
            ->with('works')
            ->select('users.*', 'avatar.avatar as avatar')
            ->paginate(8)
            ->withQueryString();

        return view('friends', compact('users'));
    }

    public function destroy(Request $request){
        $request->validate([
            'friendId' => 'required|integer',
        ]);

        $id = Auth::id();
        Friend::where('userId', '=', $id)
            ->where('friendId', '=', $request->friendId)
            ->delete();

        Friend::where('friendId', '=', $id)
            ->where('userId', '=', $request->friendId)
            ->delete();

        session()->flash('message', 'Unfriend success');
        return redirect()->route('friends');
    }
}
