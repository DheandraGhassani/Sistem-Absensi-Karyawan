<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{

    //
    public function keluar(Request $request)
    {
        // Ambil employee dari user yang sedang login
        $employee = Auth::user()->employee->first();

        // Pastikan employee ditemukan
        if (!$employee) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Employee tidak ditemukan!'
                ],
                404
            );
        }

        // Ambil tanggal hari ini
        $today = Carbon::today();

        // Cek apakah ada absensi untuk employee hari ini
        $absensi = Absensi::where('employee_id', $employee->id)
            ->whereDate('date_absensi', $today)
            ->first();

        // Ambil waktu saat ini
        $currentTime = Carbon::now()->format('H:i:s');

        // Jika absensi ditemukan
        if ($absensi) {
            // Cek apakah time_out belum diisi
            if ($absensi->time_out === '00:00:00' || $absensi->time_out === null) {
                // Update kolom time_out
                $absensi->update(['time_out' => $currentTime]);

                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Berhasil absen keluar'
                    ],
                    200
                );
            } else {
                // Jika time_out sudah diisi sebelumnya
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Gagal absen keluar, kamu sudah absen keluar sebelumnya!'
                    ],
                    400
                );
            }
        }

        // Jika absensi hari ini tidak ditemukan
        return response()->json(
            [
                'status' => false,
                'message' => 'Gagal absen keluar, kamu belum absen masuk hari ini!'
            ],
            403
        );
    }


    public function masuk()
    {
        $employee = Auth::user()->employee->first();

        if (!$employee) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Employee tidak ditemukan!'
                ],
                404
            );
        }

        $today = Carbon::today();

        $absensi = Absensi::where('employee_id', $employee->id)
            ->whereDate('date_absensi', $today)
            ->exists();
        if ($absensi) {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'Gagal absen! kamu sudah absen hari ini!'
                ],
                400
            );
        }

        $currentTime = Carbon::now()->format('H:i:s');


        Absensi::create(
            [
                'date_absensi' => $today,
                'time_in' => $currentTime,
                'time_out' => '00:00:00',
                'status' => 'Hadir',
                'employee_id' => $employee->id
            ]
        );
        return response()->json(
            [
                'status' => true,
                'message' => 'berhasil absen!'
            ],
            200
        );
    }
}
