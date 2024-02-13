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

Route::middleware('auth:admin')->prefix('setting')->controller('SettingController')->group(function(){
    Route::get('/', 'index')->name('admin.show.setting.attributes');
    Route::post('update-setting', 'updateSettings')->name('admin.update.setting');
});

