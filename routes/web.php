<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\UserController;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/', [PortalController::class, 'showLoginForm'])->name('siswa.login');
Route::post('/portal/login', [PortalController::class, 'doLogin'])->name('portal.doLogin');
Route::get('/portal/dashboard', [PortalController::class, 'index'])->name('portal.dashboard');
Route::get('/portal/exam', [PortalController::class, 'exam'])->name('portal.exam');
Route::get('/portal/start/{ujian_id}', [PortalController::class, 'start'])->name('portal.start');
Route::post('/portal/start/submit/{ujian_id}', [PortalController::class, 'examSubmit'])->name('portal.start.submit');



Route::middleware('auth')->group(function () {
    
    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UserController::class);
    Route::resource('materis', MateriController::class);
    Route::resource('soals', SoalController::class);
    Route::resource('ujian', UjianController::class);
});