<?php

use App\Http\Controllers\AvatarController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\FriendRequestController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\UserAvatarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::middleware('user_auth')->group(function () {
    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Top Up
    Route::get('/topup', [TopUpController::class, 'index'])->name('topUpPage');
    Route::post('/topup', [TopUpController::class, 'topUp'])->name('topUp');

    // Avatar
    Route::get('/avatar', [AvatarController::class, 'index'])->name('avatarPage');
    Route::post('/buy-avatar', [UserAvatarController::class, 'create'])->name('buyAvatar');
    Route::post('/equip-avatar', [UserAvatarController::class, 'equip'])->name('equipAvatar');
    Route::post('/unequip-avatar', [UserAvatarController::class, 'unequip'])->name('unequipAvatar');

    // Setting
    Route::get('/setting', [UserController::class, 'index'])->name('setting');
    Route::post('/change-visibility', [UserController::class, 'changeVisibility'])->name('changeVisibility');

    // Friend
    Route::get('/friends', [FriendController::class, 'index'])->name('friends');
    Route::delete('/delete-friend', [FriendController::class, 'destroy'])->name('unfriend');

    // Friend Request
    Route::get('/friend-requests', [FriendRequestController::class, 'index'])->name('friendRequest');
    Route::post('/add-friend', [FriendRequestController::class, 'addFriend'])->name('addFriend');
    Route::delete('/cancel-friend-request', [FriendRequestController::class, 'destroy'])->name('cancelFriendRequest');

    // Gift Avatar
    Route::get('/give-avatar/{user}', [GiftController::class, 'givePage'])->name('avatarGift');
    Route::post('/give/{user}/{avatar}', [GiftController::class, 'give'])->name('giveAvatar');
});

Route::middleware('auth')->group(function(){
    Route::view('/register-payment', 'registerPayment')->name('registration_payment');
    Route::post('/register/payment', [PaymentController::class, 'pay'])->name('registerPay');
});
