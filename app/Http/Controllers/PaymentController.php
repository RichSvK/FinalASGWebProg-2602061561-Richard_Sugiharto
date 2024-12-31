<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function pay(Request $request){
        $request->validate([
            'pay' => ['required', 'numeric'],
        ]);

        $user = Auth::user();
        if($user->coin + $request->pay < 0){
            return redirect()->back()->withErrors([
                'pay' => 'You are still underpaid ' . -$user->coin + $request->pay,
            ]);
        }

        // 100 coin bonus
        $user->update([
            'coin' => $user->coin + $request->pay + 100,
        ]);

        return response()->json([
            'message' => 'Payment success',
        ]);
    }
}
