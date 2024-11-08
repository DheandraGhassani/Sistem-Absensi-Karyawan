@extends('layouts.admin')

@section('content')
    <div class="flex justify-between mt-3 mx-5">
        <div class="flex flex-col">
            <h2 class="text-2xl font-bold">Laporan Absensi</h2>
            <div class="flex flex-row">
                <p class="text-gray-500">Laporan / <span class="text-black">Laporan Absensi</span></p>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap gap-5 mt-5 mx-5">
        <!-- Filter Tanggal -->
        <div>
            <label for="filter_waktu" class="block text-sm font-medium">Filter Waktu</label>
            <select id="filter_waktu" name="filter_waktu" onchange="updateDateInput()"
                class="mt-1 block w-full border rounded-md p-2">
                <option value="daily">Per Hari</option>
                <option value="weekly">Per Minggu</option>
                <option value="monthly">Per Bulan</option>
            </select>
        </div>

        <!-- Input Tanggal -->
        <div id="dateInput">
            <label for="tanggal" class="block text-sm font-medium">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" class="mt-1 block w-full border rounded-md p-2">
        </div>

        <!-- Input Bulan -->
        <div id="monthInput" style="display: none;">
            <label for="bulan" class="block text-sm font-medium">Bulan</label>
            <input type="month" id="bulan" name="bulan" class="mt-1 block w-full border rounded-md p-2">
        </div>

        <!-- Input Karyawan -->
        <div>
            <label for="karyawan" class="block text-sm font-medium">Pilih Karyawan</label>
            <select id="karyawan" name="karyawan" class="mt-1 block w-full border rounded-md p-2">
                <option value="all">Semua Karyawan</option>
                <!-- Tambahkan daftar karyawan dari database -->
                @foreach ($karyawanList as $karyawan)
                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tombol Ekspor -->
        <div class="flex items-end">
            <button onclick="exportData()" class="px-6 py-2 bg-[#86DED7] rounded-lg text-white">Ekspor Laporan</button>
        </div>
    </div>

    <div class="mx-5 mt-5">
        <table id="absensiTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data absensi karyawan akan ditampilkan di sini -->
                @foreach ($absensiData as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->karyawan->nama }}</td>
                        <td>{{ $data->tanggal }}</td>
                        <td>{{ $data->jam_masuk }}</td>
                        <td>{{ $data->jam_keluar }}</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        new DataTable('#absensiTable');

        function updateDateInput() {
            const filterWaktu = document.getElementById('filter_waktu').value;
            document.getElementById('dateInput').style.display = filterWaktu === 'daily' ? 'block' : 'none';
            document.getElementById('monthInput').style.display = filterWaktu === 'monthly' ? 'block' : 'none';
        }

        function exportData() {
            const filterWaktu = document.getElementById('filter_waktu').value;
            const karyawan = document.getElementById('karyawan').value;
            let tanggal = document.getElementById('tanggal').value;
            let bulan = document.getElementById('bulan').value;

            // Lakukan pemrosesan ekspor data berdasarkan filter yang dipilih
            let url = `/laporan/export?filter_waktu=${filterWaktu}&karyawan=${karyawan}`;

            if (filterWaktu === 'daily') {
                url += `&tanggal=${tanggal}`;
            } else if (filterWaktu === 'monthly') {
                url += `&bulan=${bulan}`;
            }

            // Redirect ke URL ekspor (aksi akan memicu controller untuk proses ekspor)
            window.location.href = url;
        }
    </script>
@endsection
