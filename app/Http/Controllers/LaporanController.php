<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function index()
    {

        $karyawanList = [
            (object)['id' => 1, 'nama' => 'John Doe', 'nip' => '123456', 'divisi' => 'IT'],
            (object)['id' => 2, 'nama' => 'Jane Smith', 'nip' => '123457', 'divisi' => 'HR'],
            (object)['id' => 3, 'nama' => 'Alex Johnson', 'nip' => '123458', 'divisi' => 'Finance'],
            // Tambahkan karyawan lain jika diperlukan
        ];
        $dataAbsensi = [
            (object)[
                'id' => 1,
                'karyawan' => (object) [
                    'nama' => 'Jhon doe'
                ],
                'nip' => '123456',
                'tanggal' => '2024-11-01',
                'jam_masuk' => '08:00',
                'jam_keluar' => '17:00',
                'status' => 'Hadir'
            ],
            (object)[
                'id' => 2,
                'karyawan' => (object) [
                    'nama' => 'jhane smith'
                ],
                'nip' => '123457',
                'tanggal' => '2024-11-01',
                'jam_masuk' => '08:15',
                'jam_keluar' => '17:10',
                'status' => 'Hadir'
            ],
            (object)[
                'id' => 3,
                'karyawan' => (object) [
                    'nama' => 'jhane Cole'
                ],
                'nip' => '123456',
                'tanggal' => '2024-11-02',
                'jam_masuk' => '08:05',
                'jam_keluar' => '17:05',
                'status' => 'Hadir'
            ],
            (object)[
                'id' => 4,
                'karyawan' => (object) [
                    'nama' => 'Kagokane'
                ],
                'nip' => '123457',
                'tanggal' => '2024-11-02',
                'jam_masuk' => '08:10',
                'jam_keluar' => '17:00',
                'status' => 'Hadir'
            ],
            (object)[
                'id' => 5,
                'karyawan' => (object) [
                    'nama' => 'Ole romeny'
                ],
                'nip' => '123458',
                'tanggal' => '2024-11-01',
                'jam_masuk' => '08:30',
                'jam_keluar' => '16:50',
                'status' => 'Terlambat'
            ],
            // Tambahkan data dummy lainnya sesuai kebutuhan
        ];
        $dataPerBulan = array_filter($dataAbsensi, function ($absensi) {
            return substr($absensi->tanggal, 0, 7) === '2024-11';
        });

        // Misalnya: Filter data absensi untuk minggu pertama November 2024
        $dataPerMinggu = array_filter($dataAbsensi, function ($absensi) {
            return $absensi->tanggal >= '2024-11-01' && $absensi->tanggal <= '2024-11-07';
        });

        // Kirim data ke view
        return view('admin.laporan.index', [
            'absensiData' => $dataAbsensi,
            'dataPerBulan' => $dataPerBulan,
            'dataPerMinggu' => $dataPerMinggu,
            'karyawanList' => $karyawanList
        ]);
    }
}
