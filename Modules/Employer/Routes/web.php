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
Route::prefix(LaravelLocalization::setLocale())->middleware('localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () {

Route::prefix('panel/employer')->controller('Dashboard\EmployerDashboardController')->middleware('auth:employer')->group(function () {

    Route::get('/', 'index')->name('show.employer.panel');
    Route::get('/profit', 'profit')->name('profit.employer.panel');
    Route::get('/Walletbalance', 'Walletbalance')->name('Walletbalance.employer.panel');
    Route::post('log-out', 'logout')->name('employer.logout');
});
Route::prefix('panel/employer/my-profile')->controller('Employer\EmployerProfileController')->middleware('auth:employer')->group(function() {
    Route::get('/', 'showMyProfile')->name('employer.show.my.profile');
    Route::get('edit-my-profile','showUpdateMyProfileForm')->name('employer.show.edit.my.profile.form');
    Route::post('update-my-profile', 'updateMyProfile')->name('employer.update.my.profile');
    Route::post('fetch-cities', 'fetchCity')->name('employer.fetch.cities.when.update.profile');
});
});

Route::prefix('panel/employer/verify-account')->middleware('auth:employer')->controller('Employer\VerifyAccountController')->group(function() {
    Route::get('send-verify-email', 'SendEmailVerification')->name('employer.send.email.verify');
    Route::get('verify-email-account/{token}/{employer_number}', 'verifyAccount')->name('verify.employer.account');
    Route::get('send-sms-verification', 'SendSMSVerification')->name('employer.send.sms.verification');

});
Route::prefix('panel/employer/financial-affairs/discountCode')->middleware(['auth:employer','employerProfileCompleted','enabledEmployer','IsEmployerVerifyEmail'])->group(function() {
    Route::get('/', 'Employer\DiscountCodeController@index')->name('employer.show.my.discount.code');
    Route::get('invoice-of-discount/{task}/{discountCode}', 'Employer\DiscountCodeController@showDiscountCodeInvoice')->name('employer.show.discountCode.invoice');
});

Route::prefix(LaravelLocalization::setLocale())->middleware('localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () {

Route::prefix('panel/employer/management-affairs/switch-account')->controller('Employer\SwitchingAccountController')
    ->middleware(['auth:employer','employerProfileCompleted','enabledEmployer','IsEmployerVerifyEmail'])->group(function() {
    Route::post('/', 'switchToWorker')->name('employer.switch.account.to.worker');
    Route::get('history','history')->name('employer.show.switching.account.history');
    Route::get('wallet-history', 'walletHistory')->name('employer.show.my.wallet.history');

});
Route::prefix('panel/employer/financial-affairs/switch-account')->controller('Employer\SwitchingAccountController')
    ->middleware(['auth:employer','employerProfileCompleted','enabledEmployer','IsEmployerVerifyEmail'])->group(function() {
        Route::get('employer-to-worker-with-transfer-wallet-balance','showSwitchToWorkerAndTransferWalletBalanceForm')->name('employer.show.switch.account.to.worker.with.transfer.wallet.balance.form');

        Route::post('switch-to-worker-and-transfer-balance','switchToWorkerAndTransferWalletBalance')->name('employer.switch.account.to.worker.with.transfer.wallet.balance');
});
});



