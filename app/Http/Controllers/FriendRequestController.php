<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FriendRequest;
use App\Models\Friend;

class FriendRequestController extends Controller
{

    public function index(){
        $user = Auth::user();
        $friend_requests = FriendRequest::where('userId', '=', $user->id)
            ->join('users', 'friend_request.friendId', '=', 'users.id')
            ->select('friend_request.id as id', 'users.name as name', 'users.email as email')
            ->get();
        return view('friendRequest', compact('friend_requests'));
    }

    public function addFriend(Request $request){
        $request->validate([
            'friendId' => 'required|integer',
        ]);

        $user = Auth::user();

        $friend = Friend::where('userId', '=', $user->id)
            ->where('friendId', '=', $request->friendId)
            ->first();

        if($friend){
            session()->flash('error', 'Friend already added');
            return redirect()->route('friends');
        }

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

        $friend_request = FriendRequest::where('friendId', '=', $request->friendId)
            ->where('userId', '=', $user->id)
            ->first();

        if($friend_request){
            session()->flash('error', 'Friend request already sent');
            return redirect()->route('friendRequest');
        }

        FriendRequest::create([
            'userId' => $user->id,
            'friendId' => $request->friendId,
        ]);

        session()->flash('message', 'Friend request added successfully');
        return redirect()->route('friendRequest');
    }

    public function destroy(Request $request){
        $request->validate([
            'request_id' => 'required|integer',
        ]);
        $friend_request = FriendRequest::where('id', '=', $request->request_id)
            ->first();

        if($friend_request){
            $friend_request->delete();
            session()->flash('message', 'Friend request cancelled');
            return redirect()->route('friendRequest');
        }

        session()->flash('error', 'Friend request not found');
        return redirect()->route('friends');
    }
}
