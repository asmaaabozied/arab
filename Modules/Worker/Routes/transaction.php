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


Route::prefix('panel/worker/financial-affairs')->middleware(['auth:worker', 'workerProfileCompleted','enabledWorker','IsWorkerVerifyEmail'])->group(function () {
    Route::get('my-profits', 'ProfitsController@index')->name('worker.show.my.profits');
});
Route::prefix('panel/worker/financial-affairs')->middleware(['auth:worker', 'workerProfileCompleted','enabledWorker','IsWorkerVerifyEmail'])->group(function () {
    Route::get('wallet-history', 'TransactionController@walletHistory')->name('worker.show.my.wallet.history');
    Route::get('withdraw-balance-using-paypal', 'PayPalController@showWithdrawUsingPaypalPage')->name('worker.show.my.withdraw.using.paypal.form');
    Route::post('withdraw-profits-from-my-wallet', 'PayPalController@withdrawProfitsUsingPayPal')->name('worker.withdraw.profits.using.paypal');
});
