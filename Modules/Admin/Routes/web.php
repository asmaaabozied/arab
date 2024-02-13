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
use Illuminate\Support\Facades\Session;

Session::put('applocale','ar');
Route::controller('SignInController')->group(function() {
    Route::get('sign-in', 'showSignInPage')->name('admin.show.signIn.page');
    Route::get('refresh-captcha', 'refreshCaptcha')->name('admin.refreshCaptcha');
    Route::post('signing-in', 'signingIn')->name('admin.signingIn');
//    Route::get('refresh_captcha', 'index')->name('reloadCaptcha');

});
Route::middleware('auth:admin')->group(function(){
    // Admin Dashboard
    Route::post('/log-out', 'AdminDashboardController@logout')->name('admin.logout');
    Route::get('/', 'AdminDashboardController@index')->name('admin.show.dashboard');
});

Route::prefix('admins')->middleware('auth:admin')->group(function (){
    Route::get('/', 'AdminController@index')->name('show.admins.index');

    Route::get('edit-profile/{id}','ProfileController@showEditProfilePage')
        ->name('admin.show.edit.profile.form');
    Route::post('update-profile/{id}', 'ProfileController@update')->name('admin.update.profile');
    Route::get('create-new-admin', 'AdminController@showCreateFrom')->name('admin.create.new.admin');
    Route::post('store-new-admin', 'AdminController@store')->name('admin.store.new.admin');
    Route::get('edit-admin/{id}', 'AdminController@showEditForm')->name('admin.show.edit.form.admin');
    Route::post('update-edited-admin/{id}', 'AdminController@updateEditedAdmin')->name('admin.update.edited.admin');
    Route::get('admin-destroy/{id}', 'AdminController@destroy')->name('admin.destroy.admin');
//    Route::get('admin-restore/{id}', 'AdminController@restore')->name('admin.restore.admin');

});

