<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $users = User::where('visibility', '=', 'visible')->with('works');

        if($request->has('search') && $request->search != ''){
            $users = $users->whereHas('works', function ($query) use ($request) {
                $query->where('work', 'like', '%' . $request->search . '%');
            });
        }

        if($request->has('gender') && $request->gender !== 'all'){
            $users = $users->where('gender', 'like', $request->gender);
        }

        $users = $users->paginate(10)->withQueryString();
        return view('home', compact('users'));
    }
}
