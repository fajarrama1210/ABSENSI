<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DispenController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\UserController;

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard-Admin', [AdminController::class, 'index'])->name('dashboardAdmin');
        Route::resource('level', LevelController::class);
        Route::resource('Jurusan', MajorController::class);
        Route::post('/dispensasi/{id}/update-status', [DispenController::class, 'Update'])->name('dispen.updateStatus');
        Route::get('/izin/{id}', [DispenController::class, 'show'])->name('dispen.show');
        Route::get('Absensi', [PresenceController::class, 'indexAdmin'])->name('presences');
        Route::get('/daftar-Pengguna', [UserController::class, 'list_userAdmin'])->name('list.userAdmin');
        Route::get('/IzinPengguna', [DispenController::class, 'indexAdmin'])->name('dispen.indexAdmin');
        Route::get('/DispenApprove/{dispen}', [DispenController::class, 'approve'])->name('dispeApprove');
        Route::get('/DispenReject/{dispen}', [DispenController::class, 'reject'])->name('dispenReject');
        Route::delete('/DispenHapus/{dispen}', [DispenController::class, 'destroy'])->name('dispenDestroy');
        Route::get('/Konfirmasi-User', [UserController::class, 'confirm'])->name('confirmUser');
        Route::get('/user/approve/{id}', [UserController::class, 'approve'])->name('userApprove');
        Route::get('/user/reject/{id}', [UserController::class, 'reject'])->name('userReject');
        Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('userDestroy');
    });

    Route::middleware('role:user')->group(function () {
        Route::get('/dashboard-User', [UserController::class, 'index'])->name('dashboardUser');
        Route::get('/absen-siswa', [PresenceController::class, 'index'])->name('absences');
        Route::get('/Dispen', [DispenController::class, 'index'])->name('dispen');
        Route::get('/detail-user/{id}', [DispenController::class, 'detailUser'])->name('detailUser');

        // Route::get('dispen/create', [DispenController::class, 'create'])->name('dispenCreate');
        Route::post('/dispen/Store', [DispenController::class, 'store'])->name('dispenStore');
        Route::post('/absen-datang', [PresenceController::class, 'absenceComes'])->name('absenceComes');
        Route::post('/absen-pulang', [PresenceController::class, 'absenceGoes'])->name('absenceGoes');
        Route::get('/daftar-user', [UserController::class, 'listUser'])->name('listUser');
    });
});
Route::get('data',[AdminController::class, 'countPresencesByStatus'])->name('data');
Route::get('izin/create/create', [DispenController::class, 'create'])->name('cobaCreate');
