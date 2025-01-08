@extends('layouts.admin')

@section('content')
    <div class="flex justify-between mt-3 mx-5">
        <div class="flex flex-col">
            <h2 class="text-2xl font-bold">Data Golongan</h2>
            <div class="flex flex-row">
                <p class="text-gray-500">Karyawan / <span class="text-black">Data Golongan</span></p>
            </div>
        </div>
        <button onclick="openModal()" class="px-6 py-2 bg-[#86DED7] rounded-lg text-white">Tambah Golongan <i
                class="fa-solid fa-plus text-white"></i> </button>
    </div>

    <div id="modalTambahGolongan" class="modal">
        <div class="modal-header">
            <div class="flex justify-between">
                <h2>Tambah Golongan</h2>
                <button onclick="closeModal()" class="close-modal" id="closeModal">X</button>
            </div>
        </div>
        <div class="modal-content">
            <form action="{{ route('golongan.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 items-center justify-start text-start gap-5">
                    <div>
                        <label for="nama_golongan" class="block text-sm font-medium">Nama Golongan</label>
                        <input type="text" name="name" id="nama_golongan"
                            class="mt-1 block w-full border rounded-md p-2" required>
                    </div>
                    <div>
                        <label for="deskripsi" class="block text-sm font-medium">Deskripsi</label>
                        <input type="text" name="description" id="deskripsi"
                            class="mt-1 block w-full border rounded-md p-2" required>
                    </div>
                    <div>
                        <label for="tingkat" class="block text-sm font-medium">Tingkat</label>
                        <input type="text" name="level" id="tingkat" class="mt-1 block w-full border rounded-md p-2"
                            required>
                    </div>
                    <div>
                        <label for="gaji_minimum" class="block text-sm font-medium">Gaji Minimum</label>
                        <input type="number" name="minimum_wage" id="gaji_minimum"
                            class="mt-1 block w-full border rounded-md p-2" required>
                    </div>
                    <div>
                        <label for="gaji_maksimum" class="block text-sm font-medium">Gaji Maksimum</label>
                        <input type="number" name="maximum_wage" id="gaji_maksimum"
                            class="mt-1 block w-full border rounded-md p-2" required>
                    </div>
                </div>
                <div class="mt-4 w-full">
                    <button type="submit" class="px-20 py-2 bg-[#86DED7] rounded-lg text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>


    <div id="modalEditGolongan" class="modal">
        <div class="modal-header">
            <div class="flex justify-between">
                <h2>Edit Golongan</h2>
                <button onclick="closeEditModal()" class="close-modal">X</button>
            </div>
        </div>
        <div class="modal-content">
            <form action="" method="POST" id="editGolonganForm">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 items-center justify-start text-start gap-5">
                    <div>
                        <label for="edit_nama_golongan" class="block text-sm font-medium">Nama Golongan</label>
                        <input type="text" name="name" id="edit_nama_golongan"
                            class="mt-1 block w-full border rounded-md p-2" required>
                    </div>
                    <div>
                        <label for="edit_deskripsi" class="block text-sm font-medium">Deskripsi</label>
                        <input type="text" name="description" id="edit_deskripsi"
                            class="mt-1 block w-full border rounded-md p-2" required>
                    </div>
                    <div>
                        <label for="edit_tingkat" class="block text-sm font-medium">Tingkat</label>
                        <input type="text" name="level" id="edit_tingkat"
                            class="mt-1 block w-full border rounded-md p-2" required>
                    </div>
                    <div>
                        <label for="edit_gaji_minimum" class="block text-sm font-medium">Gaji Minimum</label>
                        <input type="number" name="minimum_wage" id="edit_gaji_minimum"
                            class="mt-1 block w-full border rounded-md p-2" required>
                    </div>
                    <div>
                        <label for="edit_gaji_maksimum" class="block text-sm font-medium">Gaji Maksimum</label>
                        <input type="number" name="maximum_wage" id="edit_gaji_maksimum"
                            class="mt-1 block w-full border rounded-md p-2" required>
                    </div>
                </div>
                <div class="mt-4 w-full">
                    <button type="submit" class="px-20 py-2 bg-[#86DED7] rounded-lg text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="mx-5 mt-5">
        <table id="golonganTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Golongan</th>
                    <th>Deskripsi</th>
                    <th>Tingkat</th>
                    <th>Gaji Minimum</th>
                    <th>Gaji Maksimum</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->level }}</td>
                        <td>{{ number_format($item->minimum_wage) }}</td>
                        <td>{{ number_format($item->maximum_wage) }}</td>
                        <td class="flex items-center justify-start gap-4">
                            <button onclick="openEditModal({{ json_encode($item) }})"
                                class="px-3 py-2 bg-yellow-500 rounded-lg text-white">Edit</button>
                            <form action="{{ route('golongan.destroy', ['golongan' => $item]) }}" method="post">
                                @method('delete')
                                @csrf
                                <button onclick="confirm('Apakah kamu yakin menghapus data ini')"
                                    class="px-3 py-2 bg-red-500 rounded-lg text-white">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        new DataTable('#golonganTable');

        function openModal() {
            document.getElementById('modalTambahGolongan').classList.add('show')
        }

        function closeModal() {
            document.getElementById('modalTambahGolongan').classList.remove('show')
        }

        function openEditModal(item) {
            // Set the action URL
            document.getElementById('editGolonganForm').action = `/admin/golongan/${item.id}`;

            // Set form values
            document.getElementById('edit_nama_golongan').value = item.name;
            document.getElementById('edit_deskripsi').value = item.description;
            document.getElementById('edit_tingkat').value = item.level;
            document.getElementById('edit_gaji_minimum').value = item.minimum_wage;
            document.getElementById('edit_gaji_maksimum').value = item.maximum_wage;

            // Show the modal
            document.getElementById('modalEditGolongan').classList.add('show');
        }

        function closeEditModal() {
            document.getElementById('modalEditGolongan').classList.remove('show');
        }
    </script>
@endsection
