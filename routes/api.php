<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees',[EmployeeController::class, "all_employees"]);
Route::prefix('/employee')->group(function (){
    Route::post('/store',[EmployeeController::class,'store']);
    Route::put('/{id}',[EmployeeController::class,'update']);
    Route::delete('/{id}',[EmployeeController::class,'destroy']);
});

Route::get('/departments',[\App\Http\Controllers\DepartmentController::class,'all_departments']);
Route::get('/countries',[\App\Http\Controllers\CountryController::class,'all_countries']);
Route::get('/states',[\App\Http\Controllers\StateController::class,'all_states']);
Route::get('/cities',[\App\Http\Controllers\CityController::class,'all_cities']);
