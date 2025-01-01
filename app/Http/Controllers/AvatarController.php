<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AvatarController extends Controller
{
    public function index(){
        // Avatar 1, 2, 3 are default for invisible avatars
        $avatars = DB::table('avatar as a')
            ->leftJoin(
                DB::raw('(SELECT * FROM user_avatar WHERE userId = ' . Auth::user()->id .') as ua_sub'), // Subquery
                'a.id', '=', 'ua_sub.avatarId'
            )
            ->where('a.id', '>', 4)
            ->select('a.*', 'ua_sub.userId')
            ->get();

        return view('avatar', compact('avatars'));
    }
}
