<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view("dashboard.index");
    }

    public function cuti()
    {
        return view("dashboard.cuti.index");
    }

    public function riwayatCuti()
    {
        return view("dashboard.cuti.riwayat");
    }


    public function laporanBulanan()
    {
        return view("dashboard.laporan.bulanan");
    }

    public function laporanBulananKaryawan()
    {
        return view("dashboard.laporan.karyawan");
    }

    public function izin()
    {
        return view("dashboard.izin.index");
    }


    public function riwayatIzin(){
        return view("dashboard.izin.riwayat");

    }


    public function riwayaLampiranAbsensi() {
        return view("dashboard.cuti.riwayat-lampiran-absensi");
    }

    public function setting(){
        return view("dashboard.settings.index");
    }

}
