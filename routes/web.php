<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OfficeSetupController;
use App\Http\Controllers\AccomplishmentController;
use App\Http\Controllers\Auth\AdminLoginController;

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


Auth::routes();

// Route::get('login', [LoginController::class, 'login']);
// Route::post('login', [LoginController::class, 'submitLogin']);
Route::get('/setup', [OfficeSetupController::class, 'show'])->name('office.setup')->middleware('auth:admin');


Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home/{id}/edit', [HomeController::class, 'edit']);
Route::delete('/home/{id}/delete', [HomeController::class, 'delete']);
Route::get('/home/{id}/print/{sign}', [HomeController::class, 'print']);
Route::get('/home/{id}/print-summary/{from}/{to}', [HomeController::class, 'printSummary']);

Route::post('/calendar-ajax', [AccomplishmentController::class, 'calendarAccomplishments']);

Route::group(['prefix' => 'admin'] , function () {
	Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
	Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/print-summary/{from}/{to}', [AdminController::class, 'printSummary']);
    Route::get('/print-by-cat/{from}/{to}', [AdminController::class, 'printByCat']);



    Route::group(['namespace' => 'Auth'], function () {
        Route::get('login', [AdminLoginController::class, 'login'])->name('admin.auth.login');
        Route::post('login', [AdminLoginController::class, 'loginAdmin'])->name('admin.auth.loginAdmin');
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.auth.logout');
    });
});
