<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\UserAvatarController;
use App\Http\Controllers\UserController;
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


Route::get('/avatar', [AvatarController::class, 'index'])->name('avatarPage');
Route::post('/buy-avatar', [UserAvatarController::class, 'create'])->name('buyAvatar');
Route::post('/equip-avatar', [UserAvatarController::class, 'equip'])->name('equipAvatar');
Route::get('/setting', [UserController::class, 'index'])->name('setting');
Route::post('/change-visibility', [UserController::class, 'changeVisibility'])->name('changeVisibility');

Route::get('/friends', [FriendController::class, 'index'])->name('friends');
Route::delete('/delete-friend', [FriendController::class, 'destroy'])->name('unfriend');

Route::get('/friend-requests', [FriendRequestController::class, 'index'])->name('friendRequest');
Route::post('/add-friend', [FriendRequestController::class, 'addFriend'])->name('addFriend');
Route::delete('/cancel-friend-request', [FriendRequestController::class, 'destroy'])->name('cancelFriendRequest');
