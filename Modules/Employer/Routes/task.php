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

Route::prefix('employer/tasks')->controller('EmployerCreateTaskController')->middleware(['auth:employer','employerProfileCompleted','enabledEmployer','IsEmployerVerifyEmail'])->group(function() {

    Route::get('create-task', 'showCreateTaskForm')->name('employer.show.create.task.page');
    Route::get('show-tasks', 'showTasks')->name('employer.show.tasks.page');
    Route::post('fetch-cities', 'fetchCity')->name('employer.fetch.cities');
    Route::post('fetch-category', 'fetchCategory')->name('employer.fetch.category');
    Route::get('category-actions/{categoryType}',  'categoryActions')->name('employer.fetch.category.actions');

    Route::post('fetch-city', 'cityPrice')->name('employer.fetch.city.price');
    Route::post('fetch-category-action', 'fetchCategoryAction')->name('employer.fetch.category.action');
    Route::post('check-trust-discount-code/{task_id}', 'checkTrustDiscountCode')->name('employer.check.trust.discount.code');
    Route::post('create-task-steep-one', 'createTaskSteepOne')->name('employer.create.task.steep.one');
    Route::get('show-task-details-after-create/{task_id}/{task_number}','showTaskDetailsAfterCreate')->name('employer.show.task.details.after.create');
    Route::post('submit-and-save-task/{task_id}/{task_number}','submitAndSaveTask')->name('employer.submit.and.save.task');

});
//Route::prefix(LaravelLocalization::setLocale())->middleware('localeSessionRedirect', 'localizationRedirect', 'localeViewPath')->group(function () {


Route::prefix('employer/tasks')->middleware(['auth:employer','employerProfileCompleted','enabledEmployer','IsEmployerVerifyEmail'])->controller('EmployerMyTaskController')->group(function() {
    Route::get('not-published-tasks', 'showNotPublishedTasks')->name('employer.show.not.published.tasks');
    Route::get('delete-not-published-task/{task_id}/{task_number}', 'DeleteNoPublishedTask')->name('employer.delete.not.published.task');


    Route::get('not-payed-tasks', 'showNotPayedTasks')->name('employer.show.not.payed.tasks');
    Route::get('not-payed-task-details/{task_id}/{task_number}', 'unPayedTaskDetails')->name('employer.show.not.payed.tasks.details');
    Route::get('check-if-wallet-contains-enough-money-to-pay-task/{task_id}/{task_number}','checkIfWalletContainsEnoughMoneyToPayTask')->name('check.if.wallet.contains.enough.money.to.pay.task');
    Route::get('delete-not-payed-task/{task_id}/{task_number}', 'DeleteUnPayedTask')->name('employer.delete.not.payed.task');

    Route::get('pending-tasks', 'showPendingTasks')->name('employer.show.task.in.pending.status');
    Route::get('pending-task-details/{task_id}/{task_number}', 'pendingTaskDetails')->name('employer.show.pending.tasks.details');


    Route::get('active-tasks', 'showActiveTasks')->name('employer.show.task.in.active.status');
    Route::get('show-or-hide-active-task/{task_id}/{task_number}', 'showOrHideActiveTask')->name('employer.show.or.hide.active.task');
    Route::get('active-task-details/{task_id}/{task_number}', 'activeTaskDetails')->name('employer.show.active.tasks.details');
    Route::get('active-task-proofs/{task_id}/{task_number}', 'activeTaskProofs')->name('employer.show.active.tasks.proofs');
    Route::get('active-task-proof-details/{task_id}/{proof_id}', 'activeTaskProofDetails')->name('employer.show.active.tasks.proof.details');
    Route::get('accept-task-proof/{task_id}/{task_number}/{proof_id}/{worker_id}', 'acceptTaskProof')->name('employer.accept.task.proof');
    Route::get('reject-task-proof/{task_id}/{task_number}/{proof_id}/{worker_id}', 'rejectTaskProof')->name('employer.reject.task.proof');


    Route::get('complete-tasks', 'showCompleteTasks')->name('employer.show.task.in.complete.status');
    Route::get('complete-task-details/{task_id}/{task_number}', 'completeTaskDetails')->name('employer.show.complete.tasks.details');
    Route::get('complete-task-proofs/{task_id}/{task_number}', 'completeTaskProofs')->name('employer.show.complete.tasks.proofs');
    Route::get('complete-task-proof-details/{task_id}/{proof_id}', 'completeTaskProofDetails')->name('employer.show.complete.tasks.proof.details');


    Route::get('rejected-tasks', 'showRejectedTasks')->name('employer.show.task.in.rejected.status');
    Route::get('rejected-task-details/{task_id}/{task_number}', 'rejectedTaskDetails')->name('employer.show.rejected.tasks.details');

});

//});
