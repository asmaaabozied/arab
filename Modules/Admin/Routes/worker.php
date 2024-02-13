<?php

use Illuminate\Support\Facades\Route;

Route::prefix('workers')->controller('AdminWorkersController')->middleware('auth:admin')->group(function (){
    Route::get('/', 'index')->name('admin.show.workers');
    Route::get('enabledWorker/{worker}', 'enabledWorker')->name('admin.enabled.worker.status');
    Route::get('disabledWorker/{worker}/{days}', 'disabledWorker')->name('admin.disabled.worker.status');
    Route::get('profile/{worker}','workerProfile')->name('admin.show.worker.profile');

    Route::get('approve-task-proof/{proof}/{worker}', 'approveTaskProf')->name('admin.worker.approve.task.proof');
    Route::post('reject-task-proof/{proof}/{worker}', 'rejectTaskProf')->name('admin.worker.reject.task.proof');
//    Route::get('pended-task-proof/{proof}/{worker}', 'pendedTaskProf')->name('admin.pended.task.proof');

    Route::get('proof-details/{proof}', 'proofDetails')->name('admin.show.worker.proof.details');
    Route::get('transaction-details/{worker_id}', 'workerTransactions')->name('admin.show.worker.transactions');


});
