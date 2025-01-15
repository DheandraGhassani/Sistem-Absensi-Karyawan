@extends('layouts.user', ['showCard' => false, 'backMenu' => true])

@section('navmenu')
    <div class="flex flex-row gap-7">
        <a href="/dashboard/cuti" class="text-4xl text-white font-bold">Pengajuan Cuti</a>
        <a href="/dashboard/riwayat-cuti" class="text-4xl text-[#5B5353] font-bold">Riwayat Cuti</a>
    </div>
@endsection

@section('content')
    <div class="modal hidden" id="modalCuti">
        <div class="modal-header px-2 flex flex-row justify-between">
            <h1 class="text-2xl font-bold text-[#5B5353]">Informasi Cuti</h1>
            <button onclick="closeCuti()">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>
        <div class="modal-content bg-[#FFFFFF] p-5 rounded-lg">
            <div class="w-full text-left px-2">
                <h1 class="font-medium text-2xl text-[#5B5353]">Jumlah Cuti</h1>
                <h3 class="font-bold text-2xl text-[#5B5353]" id="jumlahCuti">-</h3>
                <div class="flex flex-row justify-between mt-3">
                    <div class="flex flex-row justify-start gap-2">
                        <img src="/assets/images/cuti.png" class="bg-[#EDEEF0] p-3 rounded-lg" alt="">
                        <div class="flex flex-col">
                            <h2 class="font-medium text-2xl text-[#5B5353]">Dari</h2>
                            <h2 class="font-bold text-lg text-[#5B5353]" id="dariCuti">-</h2>
                        </div>
                    </div>
                    <div class="flex flex-row justify-start gap-2">
                        <img src="/assets/images/cuti.png" class="bg-[#EDEEF0] p-3 rounded-lg" alt="">
                        <div class="flex flex-col">
                            <h2 class="font-medium text-2xl text-[#5B5353]">Sampai</h2>
                            <h2 class="font-bold text-lg text-[#5B5353]" id="sampaiCuti">-</h2>
                        </div>
                    </div>
                </div>
                <div class="mt-2 text-xl text-[#5B5353] font-normal">Jenis Cuti</div>
                <div class="mt-2 text-xl text-[#5B5353] font-bold" id="jenisCuti">-</div>
                <div class="mt-4 text-xl text-[#5B5353] font-bold">Lampiran</div>
                <div class="mt-2 text-xl text-[#5B5353] font-bold flex flex-row justify-between items-end">
                    <img src="/assets/images/user-persegi.png" class="h-36 w-36 object-contain" alt=""
                        id="lampiranCuti">
                </div>
                <div class="mt-2 text-white">
                    <button id="statusCuti" class="h-fit px-8 py-2 rounded-lg text-white">-</button>
                </div>
            </div>
        </div>
    </div>

    <div class="flex flex-col justify-evenly mt-4 md:flex-row h-screen w-full ">
        @foreach (['absen', 'izin', 'sakit'] as $type)
            <div class="bg-[#E8E7EB] w-[80%] md:w-[30%] rounded-md h-[80%] px-5 py-8">
                <h1 class="text-2xl font-bold text-[#5B5353]">{{ ucfirst($type) }}</h1>
                <div class="flex flex-col gap-4 px-4 my-6">
                    @foreach ($$type as $item)
                        <div class="py-2 px-4 bg-white rounded-lg cursor-pointer"
                            onclick="showCuti({{ json_encode($item) }})">
                            <h2 class="text-[#5B5353] text-lg font-bold">
                                {{ \Carbon\Carbon::parse($item->tanggal_pengajuan_mulai)->locale('id')->translatedFormat('l, d/m/Y') }}
                            </h2>
                            <p class="text-[#5B5353] text-md font-bold">{{ $item->jumlah }} Hari</p>
                            <div class="mt-4 mb-2">
                                @if ($item->status != 'Pending')
                                    <div
                                        class="pl-2 pr-3 py-2 rounded-2xl bg-[#4CF639] w-[60%] flex flex-row justify-between">
                                        <span class="text-[#5B5353] text-lg font-bold">Disetujui</span>
                                        <i class="fa-solid fa-check bg-white p-2 rounded-full"></i>
                                    </div>
                                @else
                                    <div
                                        class="pl-2 pr-3 py-2 rounded-2xl bg-[#F84136] w-[60%] flex flex-row justify-between">
                                        <span class="text-[#5B5353] text-lg font-bold">Pending</span>
                                        <i class="fa-regular fa-clock bg-white p-2 rounded-full"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function closeCuti() {
            const modal = document.getElementById('modalCuti');
            modal.classList.remove('show');
        }

        function showCuti(item) {
            // Populate modal fields with the clicked item's data
            document.getElementById('jumlahCuti').textContent = `${item.jumlah} Hari`;
            document.getElementById('dariCuti').textContent = new Date(item.tanggal_pengajuan_mulai).toLocaleDateString(
                'id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            document.getElementById('sampaiCuti').textContent = new Date(item.tanggal_pengajuan_selesai).toLocaleDateString(
                'id-ID', {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            document.getElementById('jenisCuti').textContent = item.jenis_cuti;

            console.log(item)

            // Set the lampiranFile to the img src, fallback to default image if not available
            document.getElementById('lampiranCuti').src = '/storage/' + item.lampiran_file ||
                '/assets/images/user-persegi.png';

            const statusButton = document.getElementById('statusCuti');
            if (item.status === 'Disetujui') {
                statusButton.textContent = 'Disetujui';
                statusButton.className = 'bg-[#4CF639] text-[#5B5353] h-fit px-8 py-2 rounded-lg';
            } else {
                statusButton.textContent = 'Pending';
                statusButton.className = 'bg-[#F84136] text-[#5B5353] h-fit px-8 py-2 rounded-lg';
            }

            // Show the modal
            const modal = document.getElementById('modalCuti');
            modal.classList.add('show');
        }
    </script>
@endsection
