<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Employee;
use App\Models\RequestCuti;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $employee = Auth::user()->employee->first();
        $absensis = Absensi::where('employee_id', $employee->id)->get();

        $today = Carbon::today();
        $alreadyCheckedIn = Absensi::where('employee_id', $employee->id)
            ->whereDate('date_absensi', $today)
            ->where('time_out', '00:00:00')
            ->exists();

        return view("dashboard.index", compact('employee', 'absensis', 'alreadyCheckedIn'));
    }

    public function cuti()
    {
        return view("dashboard.cuti.index");
    }

    public function riwayatCuti()
    {

        $employee = Auth::user()->employee->first();
        $employee_id = $employee->id;


        $absen = RequestCuti::where('employee_id', $employee_id)->where('jenis_cuti', 'Cuti')->get();
        $izin = RequestCuti::where('employee_id', $employee_id)->where('jenis_cuti', 'Izin')->get();
        $sakit = RequestCuti::where('employee_id', $employee_id)->where('jenis_cuti', 'Sakit')->get();
        return view("dashboard.cuti.riwayat",  compact('absen', 'izin', 'sakit'));
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


    public function riwayatIzin()
    {


        return view("dashboard.izin.riwayat");
    }


    public function riwayaLampiranAbsensi()
    {
        return view("dashboard.cuti.riwayat-lampiran-absensi");
    }

    public function setting()
    {

        return view("dashboard.settings.index");
    }
};
