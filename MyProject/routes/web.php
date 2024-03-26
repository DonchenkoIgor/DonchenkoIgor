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

Route::prefix('zoo')->middleware('check.entity.parameter')->group(function (){
   Route::get('/', function () {
       return 'Main route';
   });
    Route::get('/animals',
        [\App\Http\Controllers\AnimalController::class, 'showAll']);
    Route::get('/employees',
        [\App\Http\Controllers\EmployeeController::class, 'showAll']);
    Route::get('/foods',
        [\App\Http\Controllers\FoodController::class, 'showAll']);
});



