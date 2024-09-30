<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/history/{id}', [App\Http\Controllers\StudentController::class, 'history']);
Route::get('/getExcellentStudent/{id}', [App\Http\Controllers\StudentController::class, 'getExcellentStudent']);


Route::get('/higherThanEight', [App\Http\Controllers\StudentController::class, 'getHigherThanEight']);

Route::get('/getListHigherThan6Point5', [App\Http\Controllers\StudentController::class, 'getListHigherThan6Point5']);


Route::get('/getBestStudent1', [App\Http\Controllers\StudentController::class, 'getBestStudent1']);
Route::get('/getBestStudent2', [App\Http\Controllers\StudentController::class, 'getBestStudent2']);
Route::get('/getBestStudent3', [App\Http\Controllers\StudentController::class, 'getBestStudent3']);
