<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])
    ->middleware('user_auth')
    ->name('home');

Auth::routes();

Route::view('/register-payment', 'registerPayment')->name('registration_payment');
Route::post('/register/payment', [PaymentController::class, 'pay'])->name('registerPay');
