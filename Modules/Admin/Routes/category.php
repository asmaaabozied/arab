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

Route::middleware('auth:admin')->prefix('categories')->controller('CategoryController')->group(function(){
    Route::get('/', 'index')->name('admin.categories.index');
    Route::get('create-new-category', 'showCreateCategoryFrom')->name('admin.create.new.category');
    Route::post('store-category', 'storeNewCategory')->name('admin.store.new.category');
    Route::get('edit-category/{id}', 'showEditCategoryForm')->name('admin.show.edit.category.form');
    Route::post('update-category/{id}', 'updateCategory')->name('admin.update.category');
    Route::get('edit-action/{action}', 'showEditActionOfCategoryForm')->name('admin.show.edit.action.of.category.form');


    Route::get('actions-of-category/{category}', 'showActionsOfCategory')->name('admin.show.action.of.category');
    Route::post('update-action/{action}', 'updateActionOfCategory')->name('admin.update.action.of.category');
    Route::get('create-new-action-in-category/{category}', 'showCreateActionInCategoryForm')->name('admin.show.create.action.in.category.form');
    Route::post('store-new-action-in-category/{category}', 'storeNewActionInCategory')->name('admin.store.new.action.in.category');



});

