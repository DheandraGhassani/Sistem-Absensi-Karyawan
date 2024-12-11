@extends('layouts.user', ['showCard' => true, 'backMenu' => true])

@section('content')
    <div class="mx-20 mb-20 -translate-x-5">
        <div class="flex justify-between gap-4 lg:flex-row flex-col">
            <div class="px-20 py-2 shadow-lg bg-white rounded-lg">
                <div>
                    <div class="flex flex-row justify-between ">
                        <img src="/assets/images/Facebook.png" class="bg-white rounded-lg p-3" alt="">
                        <img src="/assets/images/Viber.png" class="bg-white rounded-full p-3" alt="">
                        <img src="/assets/images/Google.png" class="bg-white rounded-full p-3" alt="">
                        <img src="/assets/images/Instagram.png" class="bg-white rounded-full p-3" alt="">
                    </div>
                    <div class="mt-2 space-y-4">
                        <p class="text-lg text-[#5B5353]"><span class="font-bold">Nama Perusahaan : </span>PT. Informatika
                            Jaya</p>
                        <p class="text-lg text-[#5B5353]"><span class="font-bold">Email : </span>rafisudirman@gmail.com</p>
                        <p class="text-lg text-[#5B5353]"><span class="font-bold">Telepon : </span>08525524526</p>
                        <p class="text-lg text-[#5B5353]"><span class="font-bold">Alamat : </span>Jln. Pembangunan Lama no.
                            70 Blok 7A</p>
                        <p class="text-lg text-[#5B5353]"><span class="font-bold">Pemberi Persetujuan :
                            </span>nformatikasudirman123
                            @gmail.com</p>
                    </div>
                </div>

            </div>
            <div class="px-20 py-2 shadow-lg bg-white rounded-lg">
                <div>
                    <div class="grid grid-cols-2  gap-y-4">
                        <div class="flex gap-4 items-center">
                            <img src="/assets/images/user 1.png" class="p-2 rounded-full bg-white shadow-lg" alt="">
                            <p class="text-lg font-bold">Informai Pribadi</p>
                        </div>
                        <div class="flex gap-4 items-center">
                            <img src="/assets/images/user 1.png" class="p-2 rounded-full bg-white shadow-lg" alt="">
                            <p class="text-lg font-bold">Web Admin</p>
                        </div>
                        <div class="flex gap-4 items-center">
                            <img src="/assets/images/user 1.png" class="p-2 rounded-full bg-white shadow-lg" alt="">
                            <p class="text-lg font-bold">Hubungi Kami</p>
                        </div>
                        <div class="flex gap-4 items-center">
                            <img src="/assets/images/user 1.png" class="p-2 rounded-full bg-white shadow-lg" alt="">
                            <p class="text-lg font-bold">Kode Perusahaan</p>
                        </div>
                        <div class="flex gap-4 items-center">
                            <img src="/assets/images/user 1.png" class="p-2 rounded-full bg-white shadow-lg" alt="">
                            <p class="text-lg font-bold">Pengembangan Applikasi</p>
                        </div>
                        <div class="flex gap-4 items-center">
                            <img src="/assets/images/user 1.png" class="p-2 rounded-full bg-white shadow-lg" alt="">
                            <p class="text-lg font-bold">Tentang Ontime</p>
                        </div>
                        <div class="flex gap-4 items-center">
                            <img src="/assets/images/user 1.png" class="p-2 rounded-full bg-white shadow-lg" alt="">
                            <p class="text-lg font-bold">Kebijakan Applikasi</p>
                        </div>
                    </div>
                    <button class="bg-[#F28300] w-full rounded-lg py-4 mt-4 mb-2 text-black font-bold text-lg">Logout</button>
                </div>
            </div>
        </div>
    </div>
@endsection
