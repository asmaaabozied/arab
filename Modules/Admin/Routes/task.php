<?php

use Illuminate\Support\Facades\Route;

Route::prefix('tasks')->middleware('auth:admin')->controller('AdminTaskController')->group(function() {
    Route::get('/', 'index')->name('admin.tasks.index');
    Route::get('task-details/{task}', 'taskDetails')->name('admin.show.task.details');
    Route::get('pending-tasks', 'showPendingTasks')->name('admin.show.task.in.pending.status');
    Route::get('pending-task-details/{task_id}/{task_number}', 'pendingTaskDetails')->name('admin.show.pending.tasks.details');
    Route::get('rejected-pending-task/{task_id}/{task_number}', 'rejectPendingTask')->name('admin.reject.pending.task');
    Route::get('accepted-pending-task/{task_id}/{task_number}', 'acceptPendingTask')->name('admin.accepted.pending.task');


    Route::get('active-tasks', 'showActiveTasks')->name('admin.show.task.in.active.status');
    Route::get('active-task-details/{task_id}/{task_number}', 'activeTaskDetails')->name('admin.show.active.tasks.details');
    Route::post('ajax-get-active-task-details', 'getActiveTaskDetailsUsingAjax')->name('admin.get.active.tasks.details.using.ajax');
    Route::post('deferred-active-task/{task_id}', 'deferredActiveTask')->name('admin.deferred.active.tasks');

    Route::get('active-task-proofs/{task_id}/{task_number}', 'activeTaskProofs')->name('admin.show.active.tasks.proofs');
    Route::get('active-task-proof-details/{task_id}/{proof_id}', 'activeTaskProofDetails')->name('admin.show.active.tasks.proof.details');
    Route::get('accept-task-proof/{task_id}/{task_number}/{proof_id}/{worker_id}/{employer_id}', 'acceptTaskProof')->name('admin.accept.task.proof');
    Route::get('reject-task-proof/{task_id}/{task_number}/{proof_id}/{worker_id}/{employer_id}', 'rejectTaskProof')->name('admin.reject.task.proof');


    Route::get('complete-tasks', 'showCompleteTasks')->name('admin.show.task.in.complete.status');
    Route::get('complete-task-details/{task_id}/{task_number}', 'completeTaskDetails')->name('admin.show.complete.tasks.details');
    Route::get('complete-task-proofs/{task_id}/{task_number}', 'completeTaskProofs')->name('admin.show.complete.tasks.proofs');
    Route::get('complete-task-proof-details/{task_id}/{proof_id}', 'completeTaskProofDetails')->name('admin.show.complete.tasks.proof.details');


    Route::get('rejected-tasks', 'showRejectedTasks')->name('admin.show.task.in.rejected.status');
    Route::get('rejected-task-details/{task_id}/{task_number}', 'rejectedTaskDetails')->name('admin.show.rejected.tasks.details');

});


