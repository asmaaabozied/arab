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

Route::middleware('auth:admin')->prefix('discountCodes')->controller('discountCodesController')->group(function(){
    Route::get('/', 'index')->name('admin.discountCodes.index');
    Route::get('create-new-discountCode', 'showCreateDiscountCodeFrom')->name('admin.create.new.discountCode');
    Route::post('store-new-discountCode', 'storeNewDiscountCode')->name('admin.store.new.discountCode');
    Route::get('edit-discountCode/{id}', 'showEditDiscountCodeForm')->name('admin.show.edit.discountCode.form');
    Route::post('update-discountCode/{id}', 'updateDiscountCode')->name('admin.update.discountCode');
});

