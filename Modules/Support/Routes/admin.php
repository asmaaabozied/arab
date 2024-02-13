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

Route::prefix('panel/admin/support/employers')->middleware('auth:admin')->controller('TicketEmployerController')->group(function() {
    Route::get('tickets', 'showEmployerTickets')->name('admin.show.employer.tickets');
    Route::get('show-ticket-details/{ticket}', 'showTicketDetails')->name('admin.show.employer.ticket.details');
    Route::post('send-ticket-answer/{ticket}', 'sendAnswer')->name('admin.send.answer.to.employer.ticket');
    Route::post('admin-done-employer-ticket/{ticket}', 'adminDoneEmployerTicket')->name('admin.done.employer.ticket');

});

Route::prefix('panel/admin/support/workers')->middleware('auth:admin')->controller('TicketWorkerController')->group(function() {
    Route::get('tickets', 'showWorkerTickets')->name('admin.show.worker.tickets');
    Route::get('show-ticket-details/{ticket}', 'showTicketDetails')->name('admin.show.worker.ticket.details');
    Route::post('send-ticket-answer/{ticket}', 'sendAnswer')->name('admin.send.answer.to.worker.ticket');
    Route::post('admin-done-worker-ticket/{ticket}', 'adminDoneWorkerTicket')->name('admin.done.worker.ticket');

});
