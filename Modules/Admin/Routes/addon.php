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

Route::middleware('auth:admin')->prefix('addons')->controller('AddonController')->group(function(){
    Route::get('/', 'index')->name('admin.addons.index');
    Route::get('edit-addon/{addon}', 'showEditAddonForm')->name('admin.show.edit.addon.form');
    Route::post('update-addon/{addon}', 'updateAddon')->name('admin.update.addon');
});

