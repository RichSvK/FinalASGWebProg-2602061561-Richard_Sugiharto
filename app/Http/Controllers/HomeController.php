<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users = User::where('visibility', '=', 'visible')
            ->with('works')
            ->join('avatar', 'users.avatar_profile', '=', 'avatar.id');

        if($request->has('search') && $request->search != ''){
            $users = $users->whereHas('works', function ($query) use ($request) {
                $query->where('work', 'like', '%' . $request->search . '%');
            });
        }

        if($request->has('gender') && $request->gender !== 'all'){
            $users = $users->where('gender', 'like', $request->gender);
        }

        if(Auth::check()){
            $user = Auth::user();
            $users = $users->where('users.id', '!=', $user->id);
        }

        $users = $users
            ->select('users.*', 'avatar.avatar as avatar')
            ->paginate(8)
            ->withQueryString();
        return view('home', compact('users'));
    }
}
