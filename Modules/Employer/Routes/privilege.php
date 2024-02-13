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

Route::prefix('employer/management-affairs')->controller('PrivilegeController')->middleware(['auth:employer','employerProfileCompleted','enabledEmployer','IsEmployerVerifyEmail'])->group(function() {


        Route::get('show-privilege-history', 'showPrivilegeHistory')->name('employer.show.my.privilege.history');
    Route::get('rule-of-privileges', 'ruleOfPrivilege')->name('employer.show.rule.of.privileges');

//});
});
