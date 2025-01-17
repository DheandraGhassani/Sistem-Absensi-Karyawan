@extends('layouts.user', ['showCard' => true])


@section('content')
    <style>
        .modal-content {
            background-color: white
        }
    </style>

    {{-- welcome modal --}}
    <div id="welcomeModal" class="modal show">
        <div class="modal-content text-center">
            <h2>Selamat Datang</h2>
            <img src="/assets/images/profile-default.png" class="mx-auto mt-2" alt="">

            <p class="text-center mt-2">{{ $employee->nip }}</p>
            <p class="font-bold text-[#F28300] text-xl text-center">{{ Auth::user()->name }}</p>
            <p class="font-medium text-center text-black">{{ $employee->group->name }}</p>
            <p class="font-medium text-center text-black"> {{ $employee->departement }} </p>
            <p class="font-bold text-black text-xl text-center">{{ $employee->position }}</p>
            <button id="closeModal" class="modal-close text-[#F28300] text-xl text-center">Dismiss</button>
        </div>
    </div>

    <div id="masukModal" class="modal">
        <div class="modal-header text-center">
            <h1 class="text-2xl font-bold ">Scann Barcode</h1>
        </div>
        <div class="modal-content text-center">
            <img src="/assets/images/qrcode.png" class="mx-auto h-[200px]" alt="">
            <div class="bg-[#F28300] flex flex-row gap-3 text-white mx-auto w-fit px-4 py-2 mt-6 rounded-lg items-center">
                <i class="fa-solid fa-rotate text-white animate-spin"></i>
                Syncing
            </div>
        </div>
    </div>

    <div id="keluarModal" class="modal">
        <div class="modal-header text-center">
            <h1 class="text-2xl font-bold ">Scann Barcode</h1>
        </div>
        <div class="modal-content text-center">
            <img src="/assets/images/qrcode.png" class="mx-auto h-[200px]" alt="">
            <div class="bg-[#F28300] flex flex-row gap-3 text-white mx-auto w-fit px-4 py-2 mt-6 rounded-lg items-center">
                <i class="fa-solid fa-rotate text-white animate-spin"></i>
                Syncing
            </div>
        </div>
    </div>


    <div id="suksesModal" class="modal">
        <div class="modal-header text-center">
            <h1 class="text-2xl font-bold text-[#06923A] ">Absen Sukses !</h1>
        </div>
        <div class="modal-content bg-white">
            <img src="/assets/images/success_presensi.png" class="mx-auto h-[200px]" alt="">
            <h4 class="text-[#403F3F] text-lg font-bold">Anda Masuk pukul</h4>
            <h1 class="text-4xl text-[#06923A] font-bold mt-6">
                {{ \Carbon\Carbon::now()->format('H:i:s') }}
            </h1>
            <p class="text-sm text-[#06923A] font-normal mt-2">Berhasil absen pada tanggal {{ \Carbon\Carbon::now() }}</p>

            <div id="donePresensi"
                class="bg-[#F28300] flex flex-row gap-3 text-white mx-auto w-fit px-14 py-2 mt-6 rounded-lg items-center cursor-pointer">
                Done
            </div>
        </div>
    </div>

    <div id="suksesKeluarModal" class="modal">
        <div class="modal-header text-center">
            <h1 class="text-2xl font-bold text-[#06923A] ">Absen Sukses !</h1>
        </div>
        <div class="modal-content bg-white">
            <img src="/assets/images/success_presensi.png" class="mx-auto h-[200px]" alt="">
            <h4 class="text-[#403F3F] text-lg font-bold">Anda keluar pukul</h4>
            <h1 class="text-4xl text-red-700 font-bold mt-6">
                {{ \Carbon\Carbon::now()->format('H:i:s') }}
            </h1>
            <div id="doneKeluar"
                class="bg-[#F28300] flex flex-row gap-3 text-white mx-auto w-fit px-14 py-2 mt-6 rounded-lg items-center cursor-pointer">
                Done
            </div>
        </div>
    </div>



    <div id="lampiranModal" class="modal">
        <div class="modal-content text-center">
            <p class="text-center text-[#057DD4] border border-[#057DD4] rounded-lg w-20 mx-auto my-2 text-sm">Lampiran</p>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <a href="/dashboard/cuti" class="flex flex-col items-center">
                    <img src="/assets/images/cuti.png" alt="Cuti Image" class="rounded-full bg-[#EDEEF0] p-2 w-16 h-16">
                    <p class="text-[#535353] font-bold mt-2">Cuti</p>
                </a>
                <div href="/dashboard/jadwal" class="flex flex-col items-center">
                    <img src="/assets/images/cuti.png" alt="Cuti Image" class="rounded-full bg-[#EDEEF0] p-2 w-16 h-16">
                    <p class="text-[#535353] font-bold mt-2">Jadwal</p>
                </div>
                <div href="/dashboard/karyawan" class="flex flex-col items-center">
                    <img src="/assets/images/karyawan.png" alt="Cuti Image" class="rounded-full bg-[#EDEEF0] p-2 w-16 h-16">
                    <p class="text-[#535353] font-bold mt-2">Karyawan</p>
                </div>
                <div href="/dashboard/lembur" class="flex flex-col items-center">
                    <img src="/assets/images/lembur.png" alt="Cuti Image" class="rounded-full bg-[#EDEEF0] p-2 w-16 h-16">
                    <p class="text-[#535353] font-bold mt-2">Lembur</p>
                </div>
                <div href="/dashboard/penggajian" class="flex flex-col items-center">
                    <img src="/assets/images/pengajian.png" alt="Cuti Image"
                        class="rounded-full bg-[#EDEEF0] p-2 w-16 h-16">
                    <p class="text-[#535353] font-bold mt-2">Penggajian</p>
                </div>
                <div href="/dashboard/setting" class="flex flex-col items-center">
                    <img src="/assets/images/setting.png" alt="Cuti Image" class="rounded-full bg-[#EDEEF0] p-2 w-16 h-16">
                    <p class="text-[#535353] font-bold mt-2">Setting</p>
                </div>
            </div>
            <button id="closeModel" onclick="closeLampiran()"
                class="modal-close text-[#F28300] text-xl text-center">Dismiss</button>
        </div>
    </div>
    <div
        class="flex flex-col lg:flex-row justify-evenly items-start mx-2 -translate-y-[150px] space-y-6 lg:space-y-0 lg:space-x-6">
        <!-- Map Section -->
        <div class="flex flex-col justify-center w-full lg:w-[40%]">
            <div id="map" class="w-full mt-10 ml-4"></div>
            <div class="text-center">
                <i class="fa-solid fa-location-dot text-[#F28300]"></i>
                <span>Lokasi anda saat ini : <span class="text-[#F28300] font-medium">Kantor</span></span>
            </div>
            <div class="flex flex-row gap-10 justify-center mt-5">
                <button onclick="presensi()" id="btnPresensi"
                    class="hidden px-4 py-2 bg-[#F28300] rounded-lg text-white flex flex-row items-center gap-1 ">
                    <img src="/assets/images/scann.png" alt="">
                    Hadir
                </button>
                <button onclick="keluar()" id="btnKeluar"
                    class="hidden px-4 py-2 bg-[#F28300] rounded-lg text-white flex flex-row items-center gap-1 ">
                    <img src="/assets/images/scann.png" alt="">
                    Keluar
                </button>
                <button id="lampiranBtn" class="px-4 py-2 bg-[#F28300] rounded-lg text-white">Lampiran</button>
            </div>
        </div>


        <!-- History Section -->
        <div class="w-full lg:w-[40%]">
            <h2 class="text-[#F28300] font-bold mt-10">Riwayat Absensi</h2>
            <div class="flex space-y-4 flex-col">
                @foreach ($absensis as $item)
                    <div class="bg-[#F7CCCC] p-4 rounded-md flex flex-row">
                        <img src="/assets/images/press-release.png" class="bg-white p-3 rounded-lg mr-2" alt="">
                        <div class="flex items-end justify-between w-full">
                            <div class="flex flex-col justify-start font-medium">
                                <p class="text-md text-[#535353]">
                                    {{ \Carbon\Carbon::parse($item->date_absensi)->locale('id')->translatedFormat('l, d/m/Y') }}
                                </p>
                                <h4 class="text-white font-bold text-xl">{{ $item->time_in }}</h4>
                            </div>
                            <div class="flex items-center gap-1">
                                <button
                                    class="px-4 py-2 bg-[#F29B9B] rounded-lg text-red-700 font-medium">{{ $item->status }}</button>
                                {{-- <div class="rounded-full h-[5px] w-[5px] bg-black"></div> --}}
                                @if ($item->time_out == '00:00:00')
                                    <button
                                        class="px-4 py-2 bg-[#8FD1A8] rounded-lg text-[#06923A] font-medium flex flex-row items-center gap-1">
                                        <img src="/assets/images/up-arrow 1.png" alt="">
                                        Keluar
                                    </button>
                                @else
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        const btnLampiran = document.getElementById('lampiranBtn')
        const modalLampiran = document.getElementById('lampiranModal')


        btnLampiran.addEventListener('click', function() {
            modalLampiran.classList.add('show')
        })

        const welcomeModal = document.getElementById('welcomeModal');

        // Welcome Modal Dismiss Button
        document.getElementById('closeModal').addEventListener('click', () => {
            welcomeModal.classList.remove('show');
        });



        const btnPresensi = document.getElementById('btnPresensi'); // Tombol Masuk
        const btnKeluar = document.getElementById('btnKeluar'); // Tombol Keluar

        const modalMasuk = document.getElementById('masukModal'); // Modal Masuk
        const suksesModal = document.getElementById('suksesModal'); // Modal Sukses Masuk

        const modalKeluar = document.getElementById('keluarModal'); // Modal Keluar
        const suksesKeluarModal = document.getElementById('suksesKeluarModal'); // Modal Sukses Keluar


        function closeLampiran() {
            modalLampiran.classList.remove('show')
        }

        async function absenMasuk() {
            try {
                modalMasuk.classList.add('show')
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const response = await fetch('/absen/masuk', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                });

                const result = await response.json();

                console.log(result)


                modalMasuk.classList.remove('show')

                if (response.ok) {
                    suksesModal.classList.add('show')
                } else {
                    alert(result.message)
                }

            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mencoba absen masuk!');
            }
        }

        // Ambil status presensi dari server
        const sudahPresensiMasuk = {{ $alreadyCheckedIn ? 'true' : 'false' }};

        // Tampilkan tombol berdasarkan status presensi
        if (sudahPresensiMasuk) {
            btnKeluar.classList.remove('hidden'); // Tampilkan tombol Keluar
        } else {
            btnPresensi.classList.remove('hidden'); // Tampilkan tombol Masuk
        }

        btnPresensi.addEventListener('click', () => {
            modalMasuk.classList.add('show'); // Tampilkan modal masuk
            absenMasuk();
        });


        document.getElementById('donePresensi').addEventListener('click', () => {
            suksesModal.classList.remove('show');
            window.location.reload();
        });

        btnKeluar.addEventListener('click', () => {
            modalKeluar.classList.add('show');
            absenKeluar();
        });


        async function absenKeluar() {
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                console.log(csrfToken);

                const response = await fetch('/absen/keluar', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                });

                const result = await response.json();
                modalKeluar.classList.remove('show');


                if (response.ok) {
                    suksesKeluarModal.classList.add('show');
                } else {
                    alert(result.message);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mencoba absen keluar!');
            }
        }





        document.getElementById('doneKeluar').addEventListener('click', () => {
            suksesKeluarModal.classList.remove('show'); // Tutup modal sukses keluar
            window.location.reload(); // Refresh halaman untuk status baru
        });
    </script>
@endsection
