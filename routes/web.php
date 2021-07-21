<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('welcome');
});

Route::group(['prefix' => 'google'], function() {
    Route::get('/auth/redirect', function() {
        return Socialite::driver('google')->redirect();
    });
    
    Route::get('/auth/callback', function() {
        $user = Socialite::driver('google')->user();
        $userData = [
            'email' => $user->getEmail(),
            'id' => $user->getId(),
            'nickname' => $user->getNickname(),
            'avatar' => $user->getAvatar()
        ];
    
        return $userData;
    });
});

Route::group(['prefix' => 'facebook'], function() {
    Route::get('/auth/redirect', function() {
        return Socialite::driver('facebook')->redirect();
    });
    
    Route::get('/auth/callback', function() {
        $user = Socialite::driver('facebook')->user();
        $userData = [
            'email' => $user->getEmail(),
            'id' => $user->getId(),
            'nickname' => $user->getNickname(),
            'avatar' => $user->getAvatar()
        ];
    
        return $userData;
    });
});