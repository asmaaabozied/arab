<?php

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

use Illuminate\Support\Facades\Route;

Route::controller('GoogleController')->group(function() {
    //login in with google
    Route::get('auth/google', 'redirectToGoogle')->name('auth.using.google');
    Route::get('authorized/google/callback', 'handleGoogleCallback')->name('handle.authentication.using.google');

    Route::post('set/auth/type/{authType}/{tempGoogleAccountID}', 'setAuthType')->name('set.auth.google.type');


   //login with facebook
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.using.facebook');
    Route::get('authorized/facebook/callback', 'handleFacebookCallback')->name('handle.authentication.using.facebook');
    Route::post('set/auth/type/{authType}/{tempFacebookAccountID}', 'setAuthTypes')->name('set.auth.facebook.type');



    //login with apple
    Route::get('auth/apple', 'login')->name('auth.using.apple');
    Route::get('authorized/apple/callback', 'callback')->name('handle.authentication.using.apple');




});
