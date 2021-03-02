<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::middleware(['auth'])->group(function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('/user',"\App\Http\Controllers\UserAccountsController");
    Route::get('/user_search', '\App\Http\Controllers\UserAccountsController@search');
    Route::put('/pwchange/{id}','\App\Http\Controllers\UserAccountsController@pwchange');

    Route::resource('/country',"\App\Http\Controllers\CountryController");
    Route::get('/country_search', '\App\Http\Controllers\CountryController@search');

    Route::resource('/department',"\App\Http\Controllers\DepartmentController");
    Route::get('/department_search', '\App\Http\Controllers\DepartmentController@search');

    Route::resource('/city',"\App\Http\Controllers\CityController");
    Route::get('/city_search', '\App\Http\Controllers\CityController@search');

    Route::resource('/state',"\App\Http\Controllers\StateController");
    Route::get('/state_search', '\App\Http\Controllers\StateController@search');

    Route::resource('/employee',"\App\Http\Controllers\EmployeeController");


});
