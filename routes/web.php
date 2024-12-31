<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TopUpController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])
    ->middleware('user_auth')
    ->name('home');

Auth::routes();

Route::view('/register-payment', 'registerPayment')->name('registration_payment');
Route::post('/register/payment', [PaymentController::class, 'pay'])->name('registerPay');


Route::get('/topup', [TopUpController::class, 'index'])->name('topUpPage');
Route::post('/topup', [TopUpController::class, 'topUp'])->name('topUp');
