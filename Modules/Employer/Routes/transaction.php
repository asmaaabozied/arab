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

//Route::prefix(LaravelLocalization::setLocale())->middleware('localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () {

Route::prefix('employer/financial-affairs')->middleware(['auth:employer','employerProfileCompleted','enabledEmployer','IsEmployerVerifyEmail'])->group(function() {
    Route::get('wages-and-costs', 'WagesAndCostsController@index')->name('employer.show.my.wages.and.costs');
//    Route::get('wallet-history', 'TransactionController@walletHistory')->name('employer.show.my.wallet.history');

});
//});
Route::prefix('employer/financial-affairs/paypal')->controller('PayPalController')->middleware(['auth:employer','employerProfileCompleted','enabledEmployer','IsEmployerVerifyEmail'])->group(function(){
    Route::get('show-charge-wallet-form',  'showChargeWalletForm')->name('employer.show.charge.wallet.form');
    Route::post('charge-wallet', 'chargeWallet')->name('employer.payment.with.paypal');
    Route::get('payment-success', 'successPay')->name('employer.payment.success');
    Route::get('payment-error', 'errorPay')->name('employer.payment.error');
});

Route::prefix('employer/financial-affairs/paypal')->controller('PayPalController')->middleware(['auth:employer','employerProfileCompleted','enabledEmployer','IsEmployerVerifyEmail'])->group(function(){
    Route::post('charge-wallet-by-task-cost/{task_id}/{task_number}', 'chargeWalletByTaskAmount')->name('employer.charge.wallet.by.task.cost');
    Route::get('task-payment-success/{task_id}/{task_number}', 'successTaskPay')->name('employer.payment.task.success');
    Route::get('task-payment-error', 'errorTaskPay')->name('employer.payment.task.error');

});

