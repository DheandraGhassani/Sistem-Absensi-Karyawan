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
            <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 items-center justify-start text-start gap-5">
                    <!-- Profile Image -->
                    <div>
                        <label for="profile_image" class="block text-sm font-medium text-gray-700">Profile Image</label>
                        <input type="file" id="profile_image" name="profile_image"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('profile_image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIP -->
                    <div>
                        <label for="nip" class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" id="nip" name="nip"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('nip')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Divisi -->
                    <div>
                        <label for="divisi" class="block text-sm font-medium text-gray-700">Divisi</label>
                        <input type="text" id="divisi" name="divisi"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('divisi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Departement -->
                    <div>
                        <label for="departement" class="block text-sm font-medium text-gray-700">Departement</label>
                        <input type="text" id="departement" name="departement"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('departement')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                        <input type="text" id="position" name="position"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('position')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="status" name="status"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="active">Active</option>
                            <option value="non-active">Non-active</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- User -->
                    <div>
                        <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                        <select id="user_id" name="user_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="" selected disabled>Pilih User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Group -->
                    <div>
                        <label for="group_id" class="block text-sm font-medium text-gray-700">Group</label>
                        <select id="group_id" name="group_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="" selected disabled>Pilih Group</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                        @error('group_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
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
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage') . '/' . $item->profile_image }}"
                                class="thumbnail h-12 rounded-full" alt="Profile" />
                        </td>
                        <td>{{ $item->nip }}</td>
                        <td>{{ $item->divisi }}</td>
                        <td>{{ $item->departement }}</td>
                        <td>{{ $item->group->name }}</td>
                        <td>{{ $item->position }}</td>
                        <td>
                            @if ($item->status == 'active')
                                <span class="px-4 py-2 rounded-lg"
                                    style="background-color: rgba(103, 255, 83, 0.41) !important;">Active</span>
                            @else
                                <span class="px-4 py-2 rounded-lg text-white" style="background-color: red !important;">Non
                                    Active</span>
                            @endif
                        </td>
                        <td>
                            <span class="px-4 py-2 rounded-lg bg-gray-200">Belum Absen</span>
                        </td>
                        <td class="flex items-center justify-start gap-4">
                            <button onclick="openAbsensiModal('{{ $loop->iteration }}')"
                                class="px-3 py-2 bg-blue-500 rounded-lg text-white">Isi Absensi</button>
                            <button onclick="openEditModal({{ json_encode($item) }})"
                                class="px-3 py-2 bg-yellow-500 rounded-lg text-white">
                                Edit
                            </button>
                            <form class="inline " action="{{ route('karyawan.destroy', ['karyawan' => $item]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button onclick="confirm('Apakah kamu yakin menghapus data ini')" type="submit"
                                    class="px-3 py-2 bg-red-500 rounded-lg text-white">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <div id="modalEditKaryawan" class="modal hidden">
        <div class="modal-header">
            <div class="flex justify-between">
                <h2>Edit Karyawan</h2>
                <button onclick="closeEditModal()" class="close-modal" id="closeEditModal">X</button>
            </div>
        </div>
        <div class="modal-content">
            <form id="editForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 items-center justify-start text-start gap-5">
                    <!-- Profile Image -->
                    <div>
                        <label for="edit_profile_image" class="block text-sm font-medium text-gray-700">Profile
                            Image</label>
                        <input type="file" id="edit_profile_image" name="profile_image"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <img id="current_profile_image" class="mt-2 h-12 w-12 rounded-full" alt="Current Profile">
                        @error('profile_image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NIP -->
                    <div>
                        <label for="edit_nip" class="block text-sm font-medium text-gray-700">NIP</label>
                        <input type="text" id="edit_nip" name="nip"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('nip')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Divisi -->
                    <div>
                        <label for="edit_divisi" class="block text-sm font-medium text-gray-700">Divisi</label>
                        <input type="text" id="edit_divisi" name="divisi"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('divisi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Departement -->
                    <div>
                        <label for="edit_departement" class="block text-sm font-medium text-gray-700">Departement</label>
                        <input type="text" id="edit_departement" name="departement"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('departement')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Position -->
                    <div>
                        <label for="edit_position" class="block text-sm font-medium text-gray-700">Position</label>
                        <input type="text" id="edit_position" name="position"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @error('position')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="edit_status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select id="edit_status" name="status"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="active">Active</option>
                            <option value="non-active">Non-active</option>
                        </select>
                        @error('status')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- User -->
                    <div>
                        <label for="edit_user_id" class="block text-sm font-medium text-gray-700">User</label>
                        <select id="edit_user_id" name="user_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="" disabled>Pilih User</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Group -->
                    <div>
                        <label for="edit_group_id" class="block text-sm font-medium text-gray-700">Group</label>
                        <select id="edit_group_id" name="group_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="" disabled>Pilih Group</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                        @error('group_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 w-full">
                    <button type="submit" class="px-20 py-2 bg-[#86DED7] rounded-lg text-white">Simpan Perubahan</button>
                </div>
            </form>
        </div>
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
                        <select name="keterangan" id="keterangan" class="mt-1 block w-full border rounded-md p-2"
                            required>
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



        function openEditModal(data) {
            const modal = document.getElementById('modalEditKaryawan');
            const form = document.getElementById('editForm');

            // Set form action URL
            form.action = `/admin/karyawan/${data.id}`;

            // Isi data pada input fields
            document.getElementById('edit_nip').value = data.nip;
            document.getElementById('edit_divisi').value = data.divisi;
            document.getElementById('edit_departement').value = data.departement;
            document.getElementById('edit_position').value = data.position;
            document.getElementById('edit_status').value = data.status;
            document.getElementById('edit_user_id').value = data.user_id;
            document.getElementById('edit_group_id').value = data.group_id;

            // Set profile image preview
            document.getElementById('current_profile_image').src = `/storage/${data.profile_image}`;

            // Tampilkan modal
            modal.classList.add('show')
        }

        function closeEditModal() {
            const modal = document.getElementById('modalEditKaryawan');
            modal.classList.remove('show')
        }
    </script>
@endsection
