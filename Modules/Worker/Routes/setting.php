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

Route::prefix('worker/settings')->controller('LangAndCurrencyController')->middleware(['auth:worker'])->group(function() {
    Route::get('change-app-language/{lang}', 'changeAppLang')->name('worker.change.app.language');
    Route::get('change-app-currency/{currency}', 'changeCurrentCurrency')->name('worker.change.app.currency');

});
