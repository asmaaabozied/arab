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

Route::prefix('panel/worker/support')->middleware(['auth:worker','workerProfileCompleted'])->group(function() {
    Route::get('tickets', 'SupportController@showTickets')->name('worker.show.my.tickets');
    Route::get('show-ticket-details/{ticket}', 'SupportController@showTicketDetails')->name('worker.show.ticket.details');
    Route::get('create-ticket', 'SupportController@showCreateTicketForm')->name('worker.show.create.ticket.form');
    Route::post('send-ticket', 'SupportController@sendTicket')->name('worker.send.ticket');
    Route::post('fetch-section-details', 'SupportController@fetchSectionDetails')->name('worker.fetch.section.details.when.create.ticket');
    Route::post('send-ticket-answer/{ticket}', 'SupportController@sendAnswer')->name('worker.send.answer');

});
});

