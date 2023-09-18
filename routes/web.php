<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\pemakaianController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\inventarisController;
use App\Http\Controllers\FullCalenderController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/calendar', function () {
        return view('calender');
    });
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    // Route::get('/events',  [EventController::class, 'index']);
    // Route::post('/events/store', [EventController::class, 'store']);
    // Route::put('/events/{id}', [EventController::class, 'update']);
    // Route::delete('/events/{id}',[EventController::class, 'destroy']);
    Route::resource('inventaris', inventarisController::class);
    Route::resource('pemakaians', pemakaianController::class);
    Route::resource('jadwals', jadwalController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::get('/absensi/detail/periode={periode}', [AbsensiController::class, 'detail'])->name('absensi.detail');
    Route::get('/user/absen={name}', [AbsensiController::class, 'userAbsen'])->name('absensi.user');
});

Route::get('/getRoles',[RoleController::class,'getRoles'])->name('getroles');

Route::get('fullcalender', [FullCalenderController::class, 'index']);
// Route::get('/events', [EventController::class, 'index']);
Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
