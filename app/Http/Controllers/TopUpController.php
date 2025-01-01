<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopUpController extends Controller
{
    public function index(){
        return view('topup');
    }

    public function topUp(){
        $user = Auth::user();
        $user->update([
            'coin' => $user->coin + 100,
        ]);

        session()->flash('message', 'Top up successfully');
        return redirect()->route('home');
    }
}
