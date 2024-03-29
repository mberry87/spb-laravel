<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BenderaController;
use App\Http\Controllers\DashboardCotroller;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelabuhanController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SpbController;
use App\Http\Controllers\TipeKapalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('islogin')->group(function () {
    Route::get('/dashboard', [DashboardCotroller::class, 'index'])->name('dashboard');

    // pegawai
    Route::get('pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
    Route::get('create/pegawai', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('pegawai', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('pegawai/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

    // bendera
    Route::get('bendera', [BenderaController::class, 'index'])->name('bendera.index');
    Route::get('create/bendera', [BenderaController::class, 'create'])->name('bendera.create');
    Route::post('bendera', [BenderaController::class, 'store'])->name('bendera.store');
    Route::get('bendera/{id}/edit', [BenderaController::class, 'edit'])->name('bendera.edit');
    Route::put('bendera/{id}', [BenderaController::class, 'update'])->name('bendera.update');
    Route::delete('bendera/{id}', [BenderaController::class, 'destroy'])->name('bendera.destroy');

    // perusahaan
    Route::get('perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
    Route::get('create/perusahaan', [PerusahaanController::class, 'create'])->name('perusahaan.create');
    Route::post('perusahaan', [PerusahaanController::class, 'store'])->name('perusahaan.store');
    Route::get('perusahaan/{id}/edit', [PerusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::put('perusahaan/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
    Route::delete('perusahaan/{id}', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');

    // kapal
    Route::get('kapal', [KapalController::class, 'index'])->name('kapal.index');
    Route::get('create/kapal', [KapalController::class, 'create'])->name('kapal.create');
    Route::post('kapal', [KapalController::class, 'store'])->name('kapal.store');
    Route::get('kapal/{id}/edit', [KapalController::class, 'edit'])->name('kapal.edit');
    Route::put('kapal/{id}', [KapalController::class, 'update'])->name('kapal.update');
    Route::delete('kapal/{id}', [KapalController::class, 'destroy'])->name('kapal.destroy');
    // mendapatkan id yang berada di kapal
    Route::get('/get-data/{kapal_id}', [KapalController::class, 'getData'])->name('kapal.getData');

    // tipe kapal
    Route::get('tipe_kapal', [TipeKapalController::class, 'index'])->name('tipe_kapal.index');
    Route::get('create/tipe_kapal', [TipeKapalController::class, 'create'])->name('tipe_kapal.create');
    Route::post('tipe_kapal', [TipeKapalController::class, 'store'])->name('tipe_kapal.store');
    Route::get('tipe_kapal/{id}/edit', [TipeKapalController::class, 'edit'])->name('tipe_kapal.edit');
    Route::put('tipe_kapal/{id}', [TipeKapalController::class, 'update'])->name('tipe_kapal.update');
    Route::delete('tipe_kapal/{id}', [TipeKapalController::class, 'destroy'])->name('tipe_kapal.destroy');

    // pelabuhan
    Route::get('pelabuhan', [PelabuhanController::class, 'index'])->name('pelabuhan.index');
    Route::get('create/pelabuhan', [PelabuhanController::class, 'create'])->name('pelabuhan.create');
    Route::post('pelabuhan', [PelabuhanController::class, 'store'])->name('pelabuhan.store');
    Route::get('pelabuhan/{id}/edit', [PelabuhanController::class, 'edit'])->name('pelabuhan.edit');
    Route::put('pelabuhan/{id}', [PelabuhanController::class, 'update'])->name('pelabuhan.update');
    Route::delete('pelabuhan/{id}', [PelabuhanController::class, 'destroy'])->name('pelabuhan.destroy');

    //user
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('create/user', [UserController::class, 'create'])->name('user.create');
    Route::post('user', [UserController::class, 'store'])->name('user.store');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('user/{id}', [UserController::class, 'show'])->name('user.show');

    //spb
    Route::get('spb', [SpbController::class, 'index'])->name('spb.index');
    Route::get('create/spb', [SpbController::class, 'create'])->name('spb.create');
    Route::post('spb', [SpbController::class, 'store'])->name('spb.store');
    Route::get('spb/{id}/edit', [SpbController::class, 'edit'])->name('spb.edit');
    Route::put('spb/{id}', [SpbController::class, 'update'])->name('spb.update');
    Route::delete('spb/{id}', [SpbController::class, 'destroy'])->name('spb.destroy');
    Route::get('spb/{id}', [SpbController::class, 'show'])->name('spb.show');
    Route::get('cetak/spb{id}', [SpbController::class, 'cetak'])->name('cetak.spb');

    // profil
    Route::get('profil', [ProfilController::class, 'index'])->name('profil.index');
    Route::post('profil/updateFotoProfil', [ProfilController::class, 'updateFotoProfil'])->name('profil.updateFotoProfil');
    Route::post('profil/updateProfil', [ProfilController::class, 'updateProfil'])->name('profil.updateProfil');
    Route::post('profil/updatePassword', [ProfilController::class, 'updatePassword'])->name('profil.updatePassword');



    //signout
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
