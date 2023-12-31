<?php

use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaGtkController;
use App\Http\Controllers\KelolaJurusanController;
use App\Http\Controllers\KelolaKelasController;
use App\Http\Controllers\KelolaKenaikanController;
use App\Http\Controllers\KelolaMapelController;
use App\Http\Controllers\KelolaNilaiController;
use App\Http\Controllers\KelolaRombelController;
use App\Http\Controllers\KelolaSiswaController;
use App\Http\Controllers\KelolaTahunAjaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RaporController;
use App\Http\Controllers\SiswaNilaiController;

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
        Route::get('/dashboard', [DashboardController::class, 'indexAdmin'])->name('dashboard');
        Route::get('/profil/admin/{id}', [DashboardController::class, 'profilAdmin'])->name('profil.admin');
        Route::post('/profil/admin/{id}', [DashboardController::class, 'updateAdmin'])->name('update.profil.admin');

        Route::resource('nilai', KelolaNilaiController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
        Route::post('/nilai/{nilai}/input', [KelolaNilaiController::class, 'inputNilai'])->name('input.nilai');
        Route::post('/nilai/{nilai}/delete', [KelolaNilaiController::class, 'delNilai'])->name('delete.nilai');
        Route::get('nilai/{id}', [KelolaNilaiController::class, 'getNilaiData'])->name('nilai.data');

        Route::resource('absensi', AbsensiController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
        Route::post('/absensi/{absensi}/input', [AbsensiController::class, 'inputAbsen'])->name('input.absensi');
        Route::post('/absensi/{absensi}/delete', [AbsensiController::class, 'delAbsen'])->name('delete.absensi');

        Route::resource('rapor', RaporController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
        Route::post('/rapor/{rapor}/addcatatan', [RaporController::class, 'addCatatan'])->name('add.catatan');
        Route::post('/rapor/{rapor}/addsikap', [RaporController::class, 'addSikap'])->name('add.sikap');
        Route::post('/rapor/{rapor}/addpkl', [RaporController::class, 'addPkl'])->name('add.pkl');
        Route::post('/rapor/{rapor}/delpkl', [RaporController::class, 'delPkl'])->name('delete.pkl');
        Route::post('/rapor/{rapor}/addekskul', [RaporController::class, 'addEkskul'])->name('add.ekskul');
        Route::post('/rapor/{rapor}/delekskul', [RaporController::class, 'delEkskul'])->name('delete.ekskul');
        Route::get('/rapor/{rapor}/export', [RaporController::class, 'export'])->name('rapor.export');

        Route::resource('kenaikan', KelolaKenaikanController::class)->except(['create', 'edit', 'destroy']);

        Route::resource('laporan', LaporanController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
        Route::get('/laporan/{rombel}/export', [LaporanController::class, 'export'])->name('laporan.export');

        Route::resource('cetak', LaporanController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);
        Route::get('/cetak/{rombel}/export', [LaporanController::class, 'export'])->name('cetak.export');

        Route::prefix('/dashboard/kelola-sistem/')->group(function () {
            Route::name('sistem.')->group(function () {
                Route::resource('jurusan', KelolaJurusanController::class)->except(['create', 'show']);
                Route::resource('kelas', KelolaKelasController::class)->except(['create', 'show']);
                Route::resource('tahunajaran', KelolaTahunAjaranController::class)->except(['create', 'show']);
                Route::resource('rombel', KelolaRombelController::class)->except(['create']);
                Route::post('/rombel/{rombel}/addsiswa', [KelolaRombelController::class, 'addSiswa'])->name('rs.add');
                Route::post('/rombel/{rombel}/delsiswa', [KelolaRombelController::class, 'delSiswa'])->name('rs.del');
                Route::resource('mapel', KelolaMapelController::class)->except(['create', 'show']);
            });
        });

        Route::prefix('/dashboard/kelola-users/')->group(function () {
            Route::name('kelola.')->group(function () {
                Route::resource('gtk', KelolaGtkController::class)->except(['create']);
                Route::resource('siswa', KelolaSiswaController::class)->except(['create']);
            });
        });
    });

    Route::get('/siswa', [DashboardController::class, 'indexSiswa'])->name('siswa.dashboard');
    Route::get('/profil/{id}', [DashboardController::class, 'profilSiswa'])->name('profil.siswa');
    Route::post('/profil/{id}', [DashboardController::class, 'updateSiswa'])->name('update.profil.siswa');

    Route::resource('nilaisiswa', SiswaNilaiController::class)->except(['create', 'edit', 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
