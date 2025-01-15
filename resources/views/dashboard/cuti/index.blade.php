@extends('layouts.user', ['showCard' => false, 'backMenu' => true])

@section('navmenu')
    <div class="flex flex-row gap-7">
        <a href="/dashboard/cuti" class="text-4xl text-[#5B5353] font-bold">
            Pengajuan Cuti
        </a>
        <a href="/dashboard/riwayat-cuti" class="text-4xl text-white font-bold">
            Riwayat Cuti
        </a>
    </div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />

@section('content')
    <style>
        #dropZone {
            transition: border-color 0.3s;
        }
    </style>

    {{-- modal upload lampiran --}}
    <div class="modal" id="modalLampiran">
        <div class="modal-header text-center">
            <h1 class="text-[#403F3F] text-2xl" id="header_title">Upload Bukti Surat Sakit</h1>
        </div>
        <div class="modal-content">
            <div class="flex gap-3 mb-4 justify-end items-center" id="tanggal_form">
                <label for="" class="font-bold text-lg text-[#403F3F]">Tanggal :</label>
                <input type="date" class="px-4 py-2 border border-gray-500 rounded-lg" id="tanggal_surat_sakit">
            </div>

            <div id="dropZone" class="flex justify-center border border-blue-600 rounded-lg py-32 px-10">
                <img id="uploadedImage" src="/assets/images/upload.png" alt="" class="object-contain" />
            </div>

            <div class="flex mt-3 justify-evenly">
                <button onclick="closeModal()" class="px-20 py-2 rounded-lg bg-red-600 text-white h-fit">Batal</button>
                <button onclick="ajukan()" class="px-20 py-2 rounded-lg bg-[#4CF639] text-white h-fit">Ajukan</button>
            </div>
        </div>
    </div>

    <div class="max-w-[75%] mx-auto my-10">
        <div class="flex flex-row justify-between">
            <div class="flex flex-col space-x-4 justify-start">
                <div class="grid grid-cols-2 gap-4">
                    <button class="bg-[#057DD4] px-4 py-2 rounded-lg text-white mb-4">
                        Sisa Cuti 1 hari
                    </button>
                    <button class="bg-[#F29B9B] px-4 py-2 rounded-lg text-white mb-4">
                        Kuota Cuti 1 hari
                    </button>
                    <button class="bg-[#F28300] px-4 py-2 rounded-lg text-white mb-4">
                        Laporan Tahunan
                    </button>
                    <button class="bg-[#63A697] px-4 py-2 rounded-lg text-white mb-4">
                        Laporan Bulanan
                    </button>
                </div>
                <div class="mt-10">
                    <h2 class="text-[#F28300] font-bold text-2xl mb-2">Pengajuan Cuti</h2>
                    <div id="date-range-picker" date-rangepicker class="flex items-center">
                        <div class="relative">
                            <input id="datepicker-range-start" name="start" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                placeholder="Pilih tanggal mulai">
                        </div>
                        <span class="mx-4 text-gray-500">to</span>
                        <div class="relative">
                            <input id="datepicker-range-end" name="end" type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
                                placeholder="Pilih tanggal selesai">
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="rounded-lg bg-[#D1CFD780] min-w-full p-6 shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800">Jenis Cuti</h2>
                    <div class="mt-4">
                        <select name="jenis_cuti" id="jenis_cuti"
                            class="mt-2 w-96 py-3 px-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                            <option value="" disabled selected>Pilih Salah Satu</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Izin">Izin (Maks 1 hari)</option>
                            <option value="Sakit">Sakit</option>
                        </select>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800 mt-4">Lampiran Foto</h2>
                    <img src="/assets/images/profile-default.png" class="cursor-pointer" id="lampiranFoto" alt="">
                    <div class="mt-2 flex gap-4">
                        <button class="px-8 py-4 bg-[#F84136] text-white text-sm rounded-md">Batal</button>
                        <button id="submitBtn" onclick="ajukan()"
                            class="px-8 py-4 bg-[#4CF639] text-white text-sm rounded-md">Ajukan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const dropZone = document.getElementById('dropZone');
        const uploadedImage = document.getElementById('uploadedImage');

        dropZone.addEventListener('dragover', (event) => {
            event.preventDefault();
            dropZone.classList.add('border-blue-800');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('border-blue-800');
        });

        let lampiranFile = null;


        dropZone.addEventListener('drop', (event) => {
            event.preventDefault();
            dropZone.classList.remove('border-blue-800');

            const files = event.dataTransfer.files;
            if (files.length > 0) {

                lampiranFile = files[0];


                const file = files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    uploadedImage.src = e.target.result;
                }
                reader.readAsDataURL(file);
                document.getElementById('header_title').innerText = 'Detail Bukti Surat Sakit'
                document.getElementById('tanggal_form').classList.add('hidden')
            } else {
                document.getElementById('header_title').innerText = 'Upload Bukti sakit'
                document.getElementById('tanggal_form').classList.remove('hidden')
            }
        });

        document.getElementById('lampiranFoto').addEventListener('click', function() {
            document.getElementById('modalLampiran').classList.add('show')
        });

        function closeModal() {
            const modalLampiran = document.getElementById('modalLampiran')
            modalLampiran.classList.remove('show')
        }

        function ajukan() {
            const jenisCuti = document.getElementById('jenis_cuti').value;
            const tanggalMulai = document.getElementById('datepicker-range-start').value;
            const tanggalSelesai = document.getElementById('datepicker-range-end').value;
            const tanggalSuratSakit = document.getElementById('tanggal_surat_sakit').value;

            console.log(tanggalSelesai)

            // Create FormData to send the file along with other data
            let formData = new FormData();
            formData.append('jenis_cuti', jenisCuti);
            formData.append('tanggal_pengajuan_mulai', tanggalMulai);
            formData.append('tanggal_pengajuan_selesai', tanggalSelesai);
            formData.append('lampiran_file', lampiranFile); // Append the actual file
            formData.append('tanggal_surat_sakit', tanggalSuratSakit);

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch('/request/cuti', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status) {
                        alert(data.message);
                        closeModal();
                    } else {
                        alert('Gagal mengajukan cuti');
                    }
                })
                .catch(error => {
                    console.log(error)
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
@endsection
