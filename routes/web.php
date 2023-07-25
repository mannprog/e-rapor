<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelolaGtkController;
use App\Http\Controllers\KelolaSiswaController;

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
})->name('login');
Route::post('/', [AuthController::class, 'prosesLogin'])->name('prosesLogin');

Route::middleware('auth')->group(function () {
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::prefix('/dashboard/kelola-users/')->group(function () {
            Route::name('kelola.')->group(function () {
                Route::resource('gtk', KelolaGtkController::class)->except(['create']);
                Route::resource('siswa', KelolaSiswaController::class)->except(['create']);
            });
        });
    });

    Route::get('/siswa', function () {
        return view('siswa.dashboard');
    })->name('siswa.dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
