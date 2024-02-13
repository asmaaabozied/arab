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


Route::middleware('auth:admin')->prefix('privileges')->controller('PrivilegeController')->group(function(){
    Route::get('/', 'index')->name('admin.privileges.index');
    Route::get('edit-privilege/{id}', 'showEditPrivilegeForm')->name('admin.show.edit.privilege.form');
    Route::post('update-privilege/{id}', 'updatePrivilege')->name('admin.update.privilege');


});

Route::middleware('auth:admin')->prefix('employer-privileges')->controller('EmployerPrivilegeController')->group(function(){
    Route::get('/', 'index')->name('admin.show.employer.privileges.index');
    Route::get('employer/{id}', 'showEmployerPrivilegesHistory')->name('admin.show.employer.privileges.history');

});

Route::middleware('auth:admin')->prefix('worker-privileges')->controller('WorkerPrivilegeController')->group(function(){
    Route::get('/', 'index')->name('admin.show.worker.privileges.index');
    Route::get('worker/{id}', 'showWorkerPrivilegesHistory')->name('admin.show.worker.privileges.history');


});
