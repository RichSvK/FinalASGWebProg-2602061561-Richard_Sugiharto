<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FriendRequest;
use App\Models\Friend;

class FriendRequestController extends Controller
{
    public function addFriend(Request $request){
        $request->validate([
            'friendId' => 'required|integer',
        ]);

        $user = Auth::user();

        $friend_request = FriendRequest::where('userId', '=', $request->friendId)
            ->where('friendId', '=', $user->id)
            ->first();

        if($friend_request){
            Friend::create([
                'userId' => $user->id,
                'friendId' => $request->friendId,
            ]);

            Friend::create([
                'userId' => $request->friendId,
                'friendId' => $user->id,
            ]);

            $friend_request->delete();
            session()->flash('message', 'Friend added to your list');
            return redirect()->route('friends');
        }

        FriendRequest::create([
            'userId' => $user->id,
            'friendId' => $request->friendId,
        ]);

        session()->flash('message', 'Friend request added successfully');
        return redirect()->route('friends');
    }
}
