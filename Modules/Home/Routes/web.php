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

    Route::get('/','HomeController@index')->name('home');
    Route::get('/pages/{type}','HomeController@page')->name('pages');
    Route::get('/questions','HomeController@questions')->name('questions');
    Route::get('/contact','HomeController@contact')->name('contact');
    Route::get('/support','HomeController@support')->name('support');
    Route::get('/blog','HomeController@blog')->name('blog');
    Route::get('/searchBlog','HomeController@searchBlog')->name('searchBlog');
    Route::post('/sendemail','HomeController@sendemail')->name('sendemail');
    Route::post('/addContacts','HomeController@addContacts')->name('addContacts');
});

Route::get('connect', function () {
    return view('home::layouts.ConnectWithUs');
});
Route::get('Marketing', function () {
    return view('home::layouts.AffiliateMarketing');
});

Route::get('blog', function () {
    return view('home::layouts.blog');
});
Route::get('workInInternet', function () {
    return view('home::layouts.workInInternet');
});
Route::get('faq', function () {
    return view('home::layouts.faq');
});

Route::get('whoAreWe', function () {
    return view('home::layouts.whoAreWe');
});
Route::get('fees', function () {
    return view('home::layouts.feesOfWebSite');
});
Route::get('terms', function () {
    return view('home::layouts.termsOfUse');
});
Route::get('privacyPolicy', function () {
    return view('home::layouts.privacyPolicy');
});
