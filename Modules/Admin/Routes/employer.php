<?php

use Illuminate\Support\Facades\Route;

Route::prefix('employer')->controller('AdminEmployerController')->middleware('auth:admin')->group(function (){
    Route::get('/', 'index')->name('admin.show.employers');
    Route::get('enabledEmployer/{employer}', 'enabledEmployer')->name('admin.enabled.employer.status');
    Route::get('disabledEmployer/{employer}/{days}', 'disabledEmployer')->name('admin.disabled.employer.status');
    Route::get('profile/{employer}','employerProfile')->name('admin.show.employer.profile');
    Route::get('task-details/{employer}/{task}', 'taskDetails')->name('admin.show.employer.task.details');
    Route::get('transactions-details/{employer}', 'employerTransactions')->name('admin.show.employer.transaction');

});




