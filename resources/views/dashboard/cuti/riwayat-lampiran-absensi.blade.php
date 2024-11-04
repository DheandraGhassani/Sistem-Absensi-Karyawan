@extends('layouts.user', ['showCard' => false, 'backMenu' => true])

@section('navmenu')
    <div class="flex flex-row gap-7 text-center">
        <a href="/dashboard/cuti" class="text-4xl text-[#5B5353] font-bold">
            Riwayat Lampiran Absensi
        </a>
    </div>
@endsection

@section('content')
    @php
        $data = [
            [
                'date' => 'Kamis, 14 Desember 2022 : 15:56',
                'status' => false,
                'time' => '15:56',
                'location' => 'Jalan Sidomakmur, Ujung Barat Daya, West Java.',
                'keterangan' => 'Cuti',
                'lama' => '3 hari',
                'email' => 'jhondoe@example.com',
            ],
            [
                'date' => 'Selasa, 14 Desember 2022 : 15:56',
                'status' => true,
                'time' => '15:56',
                'location' => 'Jalan Sidomakmur, Ujung Barat Daya, West Java.',
                'keterangan' => 'Masuk',
                'lama' => '3 hari',
                'email' => 'jhondoe@example.com',
            ],
            [
                'date' => 'Rabu, 14 Desember 2022 : 15:56',
                'status' => false,
                'time' => '15:56',
                'location' => 'Jalan Sidomakmur, Ujung Barat Daya, West Java.',
                'keterangan' => 'Cuti',
                'lama' => '3 hari',
                'email' => 'jhondoe@example.com',
            ],
            [
                'date' => 'Jumat, 14 Desember 2022 : 15:56',
                'status' => true,
                'time' => '15:56',
                'location' => 'Jalan Sidomakmur, Ujung Barat Daya, West Java.',
                'keterangan' => 'Masuk',
                'lama' => '3 hari',
                'email' => 'jhondoe@example.com',
            ],
        ];
    @endphp

    <div class="flex flex-row justify-evenly mx-20 items-center w-full mt-4 bg-white">
        <div class="shadow-lg pl-10 px-4 py-6 rounded-xl bg-white">
            <h1 class="text-[#5B5353] text-xl font-bold mb-5">Riwayat Absensi</h1>
            @foreach ($data as $index => $item)
                <div class="flex flex-row items-center px-3 py-3 cursor-pointer {{ !$item['status'] ? 'bg-red-500' : 'bg-gray-300' }} rounded-lg mb-6"
                    onclick="updateDetails({{ json_encode($item) }})">
                    <img src="/assets/images/press-release.png" class="bg-white p-2 rounded-lg" alt="images">
                    <div class="flex flex-col gap-4 ml-3">
                        <h1 class="{{ !$item['status'] ? 'text-white' : 'text-[#5B5353]' }} text-2xl">
                            {{ $item['date'] }}
                        </h1>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="detail" class="shadow-lg pl-10 px-12 py-6 rounded-xl">
            <h1 id="detail-date" class="text-[#5B5353] text-2xl font-bold mb-5">Pilih Riwayat</h1>
            <hr class="border-[#5B5353] border-2 ">
            <p id="detail-email" class="text-[#535353] font-medium text-lg mb-6">Email</p>
            <div class="flex gap-5 items-center mb-6">
                <img src="/assets/images/clock.png" alt="">
                <p id="detail-time" class="text-[#120C0C] font-medium text-lg">Waktu</p>
            </div>

            <div class="flex gap-5 items-center mb-6">
                <img src="/assets/images/pin.png" alt="">
                <p id="detail-location" class="text-[#120C0C] font-medium text-xl">Lokasi</p>
            </div>

            <hr class="border-[#5B5353] border-2 mb-6">
            <div class="flex justify-between">
                <img src="/assets/images/user-persegi.png" alt="">
                <div class="flex flex-col justify-between">
                    <div class="flex flex-col">
                        <h3 class="text-[#535353] text-xl font-bold">Keterangan : </h3>
                        <h3 id="detail-keterangan" class="text-black text-xl font-bold">Keterangan</h3>
                    </div>
                    <h3 id="detail-lama" class="text-[#535353] text-xl font-bold">Lama : </h3>
                </div>
                <img id="status-image" src="" alt="Status" class="h-fit hidden" />
                <h3 id="detail-status"
                    class="text-red-500 text-4xl border-t-4 border-b-4 border-t-red-500 border-b-red-500 pt-2 pb-2 h-fit self-end">
                    PENDING
                </h3>
            </div>
        </div>
    </div>

    <script>
        function updateDetails(item) {
            console.log(item);
            document.getElementById('detail-date').innerText = item.date;
            document.getElementById('detail-email').innerText = item.email;
            document.getElementById('detail-time').innerText = item.time;
            document.getElementById('detail-location').innerText = item.location;
            document.getElementById('detail-keterangan').innerText = item.keterangan;
            document.getElementById('detail-lama').innerText = "Lama : " + item.lama;
            document.getElementById('detail-status').innerText = item.status ? 'HADIR' : 'PENDING';

            const statusImage = document.getElementById('status-image');
            if (item.status) {
                statusImage.classList.remove('hidden')
                document.getElementById('detail-status').classList.add('hidden')
                statusImage.src = '/assets/images/approved.png';
            } else {
                statusImage.classList.add('hidden')
                document.getElementById('detail-status').classList.remove('hidden')
                statusImage.src = '/assets/images/pending.png';
            }
        }
    </script>
@endsection
