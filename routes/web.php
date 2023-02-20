<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\pemakaianController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\FullCalenderController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('pemakaians', pemakaianController::class);
    Route::resource('jadwals', jadwalController::class);

});
Route::get('calendar-event', [CalenderController::class, 'index']);
Route::post('calendar-crud-ajax', [CalenderController::class, 'calendarEvents']);
Route::get('fullcalender', [FullCalenderController::class, 'index']);

Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);

