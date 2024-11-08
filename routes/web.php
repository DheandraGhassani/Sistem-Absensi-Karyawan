<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\KarywanController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get("login", [AuthController::class, 'login']);
Route::post("authenticate", [AuthController::class, "authenticate"])->name('authenticate');
Route::get("/dashboard", [DashboardController::class, "index"])->name('user.dashboard');
Route::get("/dashboard/cuti", [DashboardController::class, "cuti"])->name('user.cuti');
Route::get("/dashboard/riwayat-cuti", [DashboardController::class, "riwayatCuti"])->name('user.riwayatCuti');
Route::get("/dashboard/riwayat-lampiran-absensi", [DashboardController::class, "riwayaLampiranAbsensi"])->name('user.riwayat.lampiran.absensi');


Route::get("/dashboard/laporan-bulanan", [DashboardController::class, "laporanBulanan"]);
Route::get("/dashboard/laporan-bulanan/{bulan}", [DashboardController::class, "laporanBulananKaryawan"]);


Route::get("/dashboard/izin", [DashboardController::class, "izin"])->name('user.izin');
Route::get("/dashboard/riwayat-izin", [DashboardController::class, "riwayatIzin"])->name('user.riwayatIzin');

Route::get("/dashboard/setting" , [DashboardController::class , "setting"]);

Route::get("/admin/dashboard" , [AdminController::class , "index"])->name('admin.dashboard');

Route::resource("/admin/karyawan" , KarywanController::class);
Route::resource("/admin/golongan" , GolonganController::class);
Route::resource("/admin/laporan-kehadiran" , LaporanController::class);


