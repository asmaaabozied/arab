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

Route::middleware('auth:admin')->prefix('countries')->controller('CountryController')->group(function(){
    Route::get('/', 'index')->name('admin.countries.index');
    Route::get('create-new-country', 'showCreateCountryFrom')->name('admin.create.new.country');
    Route::get('cities-of-country/{country}', 'showCitiesOfCountry')->name('admin.show.cities.of.country');
    Route::post('store-country', 'storeNewCountry')->name('admin.store.new.country');
    Route::get('edit-country/{id}', 'showEditCountryForm')->name('admin.show.edit.country.form');
    Route::post('update-country/{id}', 'updateCountry')->name('admin.update.country');
    Route::get('edit-city/{city}', 'editCityOfCountry')->name('admin.show.edit.city.of.country.form');
    Route::post('update-city/{city}', 'updateCityOfCountry')->name('admin.update.city.of.country');
    Route::get('create-new-city-in-country/{country}', 'showCreateCityInCountryForm')->name('admin.show.create.city.in.country.form');
    Route::post('store-new-city-in-country/{country}', 'storeNewCityInCountry')->name('admin.store.new.city.in.country');

});

Route::middleware('auth:admin')->prefix('cities')->controller('CityController')->group(function(){
    Route::get('/', 'index')->name('admin.cities.index');
    Route::get('city-details/{id}', 'showCityDetails')->name('admin.show.city.details');
    Route::get('create-new-city', 'showCreateCityForm')->name('admin.show.create.city.form');
    Route::post('store-new-city', 'storeNewCity')->name('admin.store.new.city');
    Route::get('edit-city/{city}', 'showEditCityForm')->name('admin.show.edit.city.form');
    Route::post('update-new-city/{city}', 'updateCity')->name('admin.update.city');


});
