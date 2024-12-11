@extends('layouts.admin')

@section('content')
    <div class="flex justify-between mt-3 mx-5">
        <div class="flex flex-col">
            <h2 class="text-2xl font-bold">Data Karyawan</h2>
            <div class="flex flex-row">
                <p class="text-gray-500">Karyawan / <span class="text-black">Data Karyawan</span></p>
            </div>
        </div>
        <button onclick="openModal()" class="px-6 py-2 bg-[#86DED7] rounded-lg text-white">Tambah Karyawan <i
                class="fa-solid fa-plus text-white"></i> </button>
    </div>

    <div id="modalTambahKaryawan" class="modal">
        <div class="modal-header">
            <div class="flex justify-between">
                <h2>Tambah Karyawan</h2>
                <button onclick="closeModal()" class="close-modal" id="closeModal">X</button>
            </div>
        </div>
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                <div class="grid grid-cols-2 items-center justify-start text-start gap-5">
                    <!-- Form fields as before -->
                </div>
                <div class="mt-4 w-full">
                    <button type="submit" class="px-20 py-2 bg-[#86DED7] rounded-lg text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mx-5 mt-5">
        <table id="karyawanTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Profile Karyawan</th>
                    <th>NIP</th>
                    <th>Divisi</th>
                    <th>Department</th>
                    <th>Section</th>
                    <th>Posisi</th>
                    <th>Status</th>
                    <th>Status Absensi Hari Ini</th> <!-- Tambahkan kolom baru untuk status absensi -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ([[], [], [], []] as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="/assets/images/user-persegi.png" class="thumbnail h-12 rounded-full" alt="Profile" />
                        </td>
                        <td>123456</td>
                        <td>IT</td>
                        <td>Development</td>
                        <td>Backend</td>
                        <td>Developer</td>
                        <td>
                            <span class="px-4 py-2 rounded-lg"
                                style="background-color: rgba(103, 255, 83, 0.41) !important;">Active</span>
                        </td>
                        <td>
                            <span class="px-4 py-2 rounded-lg bg-gray-200">Belum Absen</span> <!-- Default status -->
                        </td>
                        <td class="flex items-center justify-start gap-4">
                            <button onclick="openAbsensiModal('{{ $loop->iteration }}')"
                                class="px-3 py-2 bg-blue-500 rounded-lg text-white">Isi Absensi</button>
                            <button class="px-3 py-2 bg-yellow-500 rounded-lg text-white">Edit</button>
                            <button onclick="confirm('Apakah kamu yakin menghapus data ini')"
                                class="px-3 py-2 bg-red-500 rounded-lg text-white">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for Absensi -->
    <div id="modalAbsensi" class="modal">
        <div class="modal-header">
            <div class="flex justify-between">
                <h2>Isi Absensi Hari Ini</h2>
                <button onclick="closeAbsensiModal()" class="close-modal" id="closeAbsensiModal">X</button>
            </div>
        </div>
        <div class="modal-content">
            <form action="" method="POST">
                @csrf
                <div class="grid grid-cols-1 items-center justify-start text-start gap-5">
                    <div>
                        <label for="keterangan" class="block text-sm font-medium">Keterangan Absensi</label>
                        <select name="keterangan" id="keterangan" class="mt-1 block w-full border rounded-md p-2" required>
                            <option value="Absen">Absen</option>
                            <option value="Izin">Izin</option>
                            <option value="Cuti">Cuti</option>
                        </select>
                    </div>
                </div>
                <div class="mt-4 w-full">
                    <button type="submit" class="px-20 py-2 bg-[#86DED7] rounded-lg text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        new DataTable('#karyawanTable');

        function openModal() {
            document.getElementById('modalTambahKaryawan').classList.add('show');
        }

        function closeModal() {
            document.getElementById('modalTambahKaryawan').classList.remove('show');
        }

        function openAbsensiModal(rowId) {
            // Display the modal for filling attendance
            document.getElementById('modalAbsensi').classList.add('show');
        }

        function closeAbsensiModal() {
            document.getElementById('modalAbsensi').classList.remove('show');
        }
    </script>
@endsection
