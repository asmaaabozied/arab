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

Route::middleware('auth:admin')->prefix('currency')->controller('CurrencyController')->group(function(){
    Route::get('/', 'index')->name('admin.currency.index');
    Route::get('supported-currency-codes', 'showSupportedCurrencyCodes')->name('admin.supported.currency.codes.index');
    Route::get('update-supported-currency-codes', 'updateSupportedCurrencyCodes')->name('admin.update.supported.currency.codes');
    Route::get('crate-new-currency', 'showCreateNewCurrencyForm')->name('admin.show.create.new.currency.form');
    Route::post('save-new-currency', 'CreateNewCurrency')->name('admin.create.new.currency');
    Route::get('update-all-currency-rate', 'updateAllCurrencyRate')->name('admin.update.all.currency.rate');
    Route::get('show-update-currency-form/{currency}', 'showUpdateCurrencyForm')->name('admin.show.update.currency.form');
    Route::post('update-currency/{currency}', 'updateCurrency')->name('admin.update.currency');
});

