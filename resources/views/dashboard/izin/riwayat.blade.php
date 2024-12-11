@extends('layouts.user', ['showCard' => false, 'backMenu' => true])

@section('navmenu')
    <div class="flex flex-row gap-7">
        <a href="/dashboard/izin" class="text-4xl text-white font-bold">
            Pengajuan Izin
        </a>
        <a href="/dashboard/riwayat-izin" class="text-4xl text-[#5B5353] font-bold">
            Riwayat Izin
        </a>
    </div>
@endsection

@section('content')
    @php
        $absen = [
            [
                'date' => 'Kamis, 15 Desember 2023 ',
                'jumlah' => '(2 hari Cuti)',
                'sampai' => 'Kamis, 17 Desember 2023',
                'status' => true,
            ],
            [
                'date' => 'Rabu, 25 Maret 2024 ',
                'jumlah' => '(4 hari Cuti)',
                'sampai' => 'Rabu, 29 Maret 2024',
                'status' => true,
            ],
            [
                'date' => 'Senin, 19 Oktober 2024  ',
                'jumlah' => '(6 hari Cuti)',
                'sampai' => 'Senin, 25 Oktober 2024',
                'status' => false,
            ],
        ];

        $izin = [
            [
                'date' => 'Kamis, 15 Desember 2023 ',
                'jumlah' => '(2 hari izin)',
                'status' => true,
            ],
            [
                'date' => 'Rabu, 25 Maret 2024 ',
                'jumlah' => '(4 hari izin)',
                'status' => true,
            ],
            [
                'date' => 'Senin, 19 Oktober 2024  ',
                'jumlah' => '(6 hari izin)',
                'status' => false,
            ],
        ];

        $sakit = [
            [
                'date' => 'Kamis, 15 Desember 2023 ',
                'jumlah' => '(2 hari sakit)',
                'status' => true,
            ],
            [
                'date' => 'Rabu, 25 Maret 2024 ',
                'jumlah' => '(4 hari sakit)',
                'status' => true,
            ],
        ];
    @endphp


    <div class="modal" id="modalCuti">
        <div class="modal-header px-2 flex flex-row justify-between">
            <h1 class="text-2xl font-bold text-[#5B5353]">Informasi Cuti</h1>
            <button onclick="closeCuti()">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>
        <div class="modal-content bg-[#FFFFFF]">
            <div class="w-full text-left px-2">
                <h1 class="font-medium text-2xl text-[#5B5353] ">Jumlah Cuti</h1>
                <h3 class="font-bold text-2xl text-[#5B5353]" id="jumlahCuti">2 hari</h3>
                <div class="flex flex-row justify-between mt-3">
                    <div class="flex flex-row justify-start gap-2">
                        <img src="/assets/images/cuti.png" class="bg-[#EDEEF0] p-3 rounded-lg" alt="">
                        <div class="flex flex-col">
                            <h2 class="font-medium text-2xl text-[#5B5353]">Dari</h2>
                            <h2 class="font-bold text-lg text-[#5B5353]" id="dariCuti">17 Februari 2023</h2>
                        </div>
                    </div>
                    <div class="flex flex-row justify-start gap-2">
                        <img src="/assets/images/cuti.png" class="bg-[#EDEEF0] p-3 rounded-lg" alt="">
                        <div class="flex flex-col">
                            <h2 class="font-medium text-2xl text-[#5B5353]">Sampai</h2>
                            <h2 class="font-bold text-lg text-[#5B5353]" id="sampaiCuti">17 Februari 2023</h2>
                        </div>
                    </div>
                </div>
                <div class="mt-2 text-xl text-[#5B5353] font-normal ">
                    Jenis Cuti
                </div>
                <div class="mt-2 text-xl text-[#5B5353] font-bold" id="jenisCuti">
                    Sakit
                </div>
                <div class="mt-4 text-xl text-[#5B5353] font-bold" id="jenisCuti">
                    Lampiran
                </div>
                <div class="mt-2 text-xl text-[#5B5353] font-bold flex flex-row justify-between items-end" id="jenisCuti">
                    <img src="/assets/images/user-persegi.png" alt="">
                    <button class="bg-[#4CF639] text-[#5B5353] h-fit px-8 py-2 rounded-lg">Disetujui</button>
                </div>
            </div>

        </div>
    </div>

    <div class="flex flex-col justify-evenly mt-4 md:flex-row h-screen w-full ">
        <div class="bg-[#E8E7EB] w-[80%] md:w-[30%] rounded-md h-[80%] px-5 py-8">
            <h1 class="text-2xl font-bold  text-[#5B5353]">Absen</h1>
            <div class="flex flex-col gap-4 px-4 my-6">
                @foreach ($absen as $item)
                    <div class="py-2 px-4 bg-white rounded-lg cursor-pointer" onclick="test({{ json_encode($item) }})">
                        <h2 class="text-[#5B5353] text-lg font-bold">{{ $item['date'] }}</h2>
                        <p class="text-[#5B5353] text-md font-bold">{{ $item['jumlah'] }}</p>
                        <div class="mt-4 mb-2">
                            @if ($item['status'])
                                <div class="pl-2 pr-3 py-2 rounded-2xl bg-[#4CF639] w-[60%] flex flex-row justify-between">
                                    <span class="text-[#5B5353] text-lg font-bold">Disetuju</span>
                                    <i class="fa-solid fa-check bg-white p-2 rounded-full"></i>
                                </div>
                            @else
                                <div class="pl-2 pr-3 py-2 rounded-2xl bg-[#F84136] w-[60%] flex flex-row justify-between">
                                    <span class="text-[#5B5353] text-lg font-bold">Pending</span>
                                    <i class="fa-regular fa-clock bg-white p-2 rounded-full"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bg-[#E8E7EB] w-[80%] md:w-[30%] rounded-md h-[80%] px-5 py-8">
            <h1 class="text-2xl font-bold  text-[#5B5353]">Izin</h1>
            <div class="flex flex-col gap-4 px-4 my-6">
                @foreach ($izin as $item)
                    <div class="py-2 px-4 bg-white rounded-lg">
                        <h2 class="text-[#5B5353] text-lg font-bold">{{ $item['date'] }}</h2>
                        <p class="text-[#5B5353] text-md font-bold">{{ $item['jumlah'] }}</p>
                        <div class="mt-4 mb-2">
                            @if ($item['status'])
                                <div class="pl-2 pr-3 py-2 rounded-2xl bg-[#4CF639] w-[60%] flex flex-row justify-between">
                                    <span class="text-[#5B5353] text-lg font-bold">Disetuju</span>
                                    <i class="fa-solid fa-check bg-white p-2 rounded-full"></i>
                                </div>
                            @else
                                <div class="pl-2 pr-3 py-2 rounded-2xl bg-[#F84136] w-[60%] flex flex-row justify-between">
                                    <span class="text-[#5B5353] text-lg font-bold">Pending</span>
                                    <i class="fa-regular fa-clock bg-white p-2 rounded-full"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="bg-[#E8E7EB] w-[80%] md:w-[30%] rounded-md h-[80%] px-5 py-8">
            <h1 class="text-2xl font-bold  text-[#5B5353]">Sakit</h1>
            <div class="flex flex-col gap-4 px-4 my-6">
                @foreach ($sakit as $item)
                    <div class="py-2 px-4 bg-white rounded-lg">
                        <h2 class="text-[#5B5353] text-lg font-bold">{{ $item['date'] }}</h2>
                        <p class="text-[#5B5353] text-md font-bold">{{ $item['jumlah'] }}</p>
                        <div class="mt-4 mb-2">
                            @if ($item['status'])
                                <div class="pl-2 pr-3 py-2 rounded-2xl bg-[#4CF639] w-[60%] flex flex-row justify-between">
                                    <span class="text-[#5B5353] text-lg font-bold">Disetuju</span>
                                    <i class="fa-solid fa-check bg-white p-2 rounded-full"></i>
                                </div>
                            @else
                                <div class="pl-2 pr-3 py-2 rounded-2xl bg-[#F84136] w-[60%] flex flex-row justify-between">
                                    <span class="text-[#5B5353] text-lg font-bold">Pending</span>
                                    <i class="fa-regular fa-clock bg-white p-2 rounded-full"></i>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        function closeCuti() {
            const modal = document.getElementById('modalCuti')
            modal.classList.remove('show')
        }

        function test(item) {
            const modal = document.getElementById('modalCuti')
            modal.classList.add('show')

        }
    </script>
@endsection
