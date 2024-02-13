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

Route::prefix('panel/employer/support/tickets')->controller('TicketController')->middleware(['auth:employer','employerProfileCompleted'])->group(function() {
    Route::get('/', 'showTickets')->name('employer.show.my.tickets');
    Route::get('show-ticket-details/{ticket}', 'showTicketDetails')->name('employer.show.ticket.details');
    Route::get('create-ticket', 'showCreateTicketForm')->name('employer.show.create.ticket.form');
    Route::post('send-ticket', 'sendTicket')->name('employer.send.ticket');
    Route::post('fetch-section-details', 'fetchSectionDetails')->name('employer.fetch.section.details.when.create.ticket');
    Route::post('send-ticket-answer/{ticket}', 'sendAnswer')->name('employer.send.answer');

});
});
