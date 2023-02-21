<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\{ActivityListController, DisicplineController};
use App\Http\Controllers\{CustomtableController, 
                            CustomfieldController,
                            CustomValuedController,
                        };

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
Route::resource('customField', CustomfieldController::class);
Route::resource('customTable', CustomtableController::class);
Route::resource('customValue', CustomValuedController::class);
// Route::resource('schedule', ScheduleController::class)->middleware(['can:view schedule']);