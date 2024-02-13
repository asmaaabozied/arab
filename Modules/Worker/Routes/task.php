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
//->middleware(['auth:employer','employerProfileCompleted'])
Route::prefix('panel/worker/tasks')->middleware('auth:worker')->group(function () {
    Route::get('browse-task', 'TaskController@browseTask')->name('worker.browse.task');
    Route::get('browse-task-with-paginate', 'TaskController@taskPaginate')->name('worker.browse.task.with.paginate');
    Route::get('filter-search', 'TaskFilterController@ajaxSearch')->name('worker.ajax.task.filter.search');
    Route::get('sort/{sortType}',  'TaskFilterController@sortTasks')->name('worker.ajax.task.sort');
    Route::get('category-type/{categoryType}',  'TaskFilterController@categoryTasks')->name('worker.ajax.task.categories');
    Route::get('country-type/{countryType}',  'TaskFilterController@countryTasks')->name('worker.ajax.task.country');
    Route::get('level-type/{levelType}',  'TaskFilterController@levelTasks')->name('worker.ajax.task.level');
    Route::get('cost-range',  'TaskFilterController@rangeTasks')->name('worker.ajax.task.cost.range');
});
Route::prefix('panel/worker/tasks')->middleware(['auth:worker','workerProfileCompleted','enabledWorker','IsWorkerVerifyEmail'])->group(function () {

    Route::get('task-details/{task_id}/{task_number}', 'TaskController@showTaskDetails')->name('worker.show.task.details');
    Route::post('submit-task/{task_id}/{task_number}', 'TaskController@orderToTaskDone')->name('worker.submit.to.task.done');

    Route::get('tasks-in-active-status', 'TaskController@tasksInActive')->name('worker.tasks.in.active');
    Route::get('tasks-in-active-details/{task_id}/{task_number}', 'TaskController@showTaskInActiveDetails')->name('worker.show.task.in.active.details');

    Route::get('finish-task-job-form/{task_id}/{task_number}', 'TaskController@showFinishTaskJobForm')->name('worker.show.task.finish.the.job.form');
    Route::post('finish-task-job/{task_id}/{task_number}', 'TaskController@finishTaskJob')->name('worker.task.finish.the.job');

    Route::get('tasks-in-done-status', 'TaskController@taskInDone')->name('worker.tasks.in.done');
    Route::get('tasks-in-done-details/{task_id}/{task_number}', 'TaskController@showTaskInDoneDetails')->name('worker.show.task.in.done.details');


    Route::get('tasks-in-complete-status', 'TaskController@taskInComplete')->name('worker.tasks.in.complete');
    Route::get('tasks-in-complete-details/{task_id}/{task_number}', 'TaskController@showTaskInCompleteDetails')->name('worker.show.task.in.complete.details');

    Route::get('tasks-in-rejected-status', 'TaskController@taskInRejected')->name('worker.tasks.in.rejected');
    Route::get('tasks-in-rejected-details/{task_id}/{task_number}', 'TaskController@showTaskInRejectedDetails')->name('worker.show.task.in.rejected.details');



});
