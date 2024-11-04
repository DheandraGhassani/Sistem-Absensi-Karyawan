@extends('layouts.user', ['showCard' => false, 'backMenu' => true])

@section('navmenu')
    <h1 class="text-2xl font-bold text-[#5B5353]">Laporan Cuti</h1>
@endsection

@section('content')
    <style>
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }


        .dropdown-content:hover .dropdown-content {
            display: block;
        }
    </style>

    <div class="flex justify-between space-x-6 my-10 mx-10">
        <!-- Employee Table -->
        <div class="bg-white rounded-lg shadow-xl p-6 w-2/3">
            <h2 class="text-xl font-semibold mb-4">Tabel Karyawan</h2>
            <div class="flex items-center mb-4 space-x-4">
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-green-500 rounded-full inline-block mr-2"></span>
                    <span>Cuti</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-red-500 rounded-full inline-block mr-2"></span>
                    <span>Izin</span>
                </div>
                <div class="flex items-center">
                    <span class="w-3 h-3 bg-gray-500 rounded-full inline-block mr-2"></span>
                    <span>Sakit</span>
                </div>
            </div>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr>
                        <th class="border-b py-2 px-4">Inisial</th>
                        <th class="border-b py-2 px-4">Nama</th>
                        <th class="border-b py-2 px-4">Cuti</th>
                        <th class="border-b py-2 px-4">Izin</th>
                        <th class="border-b py-2 px-4">Sakit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-gray-50">
                        <td class="border-b py-2 px-4">ADN</td>
                        <td class="border-b py-2 px-4">Adena</td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                    </tr>
                    <tr>
                        <td class="border-b py-2 px-4">IZT</td>
                        <td class="border-b py-2 px-4">Izul Tambunan</td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"><span class="w-3 h-3 bg-red-500 rounded-full inline-block"></span>
                        </td>
                        <td class="border-b py-2 px-4"></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="border-b py-2 px-4">ANR</td>
                        <td class="border-b py-2 px-4">Antares Rakha</td>
                        <td class="border-b py-2 px-4"><span class="w-3 h-3 bg-green-500 rounded-full inline-block"></span>
                        </td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                    </tr>
                    <tr>
                        <td class="border-b py-2 px-4">AYD</td>
                        <td class="border-b py-2 px-4">Ayudine</td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"><span class="w-3 h-3 bg-gray-500 rounded-full inline-block"></span>
                        </td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="border-b py-2 px-4">ALG</td>
                        <td class="border-b py-2 px-4">Alexandre Graham</td>
                        <td class="border-b py-2 px-4"><span class="w-3 h-3 bg-green-500 rounded-full inline-block"></span>
                        </td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                    </tr>
                    <tr>
                        <td class="border-b py-2 px-4">MSR</td>
                        <td class="border-b py-2 px-4">Musa Rajek</td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"><span class="w-3 h-3 bg-red-500 rounded-full inline-block"></span>
                        </td>
                        <td class="border-b py-2 px-4"></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="border-b py-2 px-4">BWD</td>
                        <td class="border-b py-2 px-4">Budi Widodo</td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                    </tr>
                    <tr>
                        <td class="border-b py-2 px-4">KMU</td>
                        <td class="border-b py-2 px-4">Kimia Mustika</td>
                        <td class="border-b py-2 px-4"><span class="w-3 h-3 bg-green-500 rounded-full inline-block"></span>
                        </td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="border-b py-2 px-4">BST</td>
                        <td class="border-b py-2 px-4">Bustiang</td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"><span class="w-3 h-3 bg-gray-500 rounded-full inline-block"></span>
                        </td>
                    </tr>
                    <tr>
                        <td class="border-b py-2 px-4">AGS</td>
                        <td class="border-b py-2 px-4">Agustini</td>
                        <td class="border-b py-2 px-4"><span class="w-3 h-3 bg-green-500 rounded-full inline-block"></span>
                        </td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                    </tr>
                    <tr class="bg-gray-50">
                        <td class="border-b py-2 px-4">JOH</td>
                        <td class="border-b py-2 px-4">Joy Hutabarat</td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"></td>
                        <td class="border-b py-2 px-4"><span class="w-3 h-3 bg-gray-500 rounded-full inline-block"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Statistics -->
        <div class="w-1/3 space-y-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">February</h2>
                    <div class="dropdown relative">
                        <button class="bg-[#99C5C480] text-gray-600 px-5 py-2 rounded-full">last month <i
                                class="fas fa-chevron-down ml-1"></i></button>
                        <div
                            class="dropdown-content absolute right-0 mt-2 rounded-lg shadow-lg bg-white w-[400px] py-2 -translate-y-5">
                            <h3 class="text-center font-bold text-2xl text-[#333333]">Year</h3>
                            @php
                                $months = ['January', 'February'];
                            @endphp

                            @foreach ($months as $item)
                                <a href="/dashboard/laporan-bulanan/{{ $item }}"
                                    class="text-center font-medium text-2xl text-[#333333] my-4">{{ $item }}</a>
                                <hr class="border-t border-[#88BEB780] h-px mx-4">
                            @endforeach

                            <div class="flex justify-center mt-2"> <!-- Flex container untuk tombol -->
                                <button class="font-bold text-xl text-[#333333] bg-[#86DED7] px-4 py-2 rounded-lg">Type
                                    Month</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <span class="w-1/2">mon</span>
                        <div class="w-1/2 flex items-center">
                            <div class="bg-gradient-to-r from-[#88BEB7] to-[#63A697] h-2 rounded-full w-3/4"></div>
                            <span class="ml-2">10</span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="w-1/2">tue</span>
                        <div class="w-1/2 flex items-center">
                            <div class="bg-gradient-to-r from-[#88BEB7] to-[#63A697] h-2 rounded-full w-1/2"></div>
                            <span class="ml-2">5</span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="w-1/2">wed</span>
                        <div class="w-1/2 flex items-center">
                            <div class="bg-gray-200 h-2 rounded-full w-0"></div>
                            <span class="ml-2">0</span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="w-1/2">thu</span>
                        <div class="w-1/2 flex items-center">
                            <div class="bg-gradient-to-r from-[#88BEB7] to-[#63A697] h-2 rounded-full w-1/4"></div>
                            <span class="ml-2">2</span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="w-1/2">fri</span>
                        <div class="w-1/2 flex items-center">
                            <div class="bg-gray-200 h-2 rounded-full w-0"></div>
                            <span class="ml-2">0</span>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <span class="w-1/2">sat</span>
                        <div class="w-1/2 flex items-center">
                            <div class="bg-gradient-to-r from-[#88BEB7] to-[#63A697] h-2 rounded-full w-3/4"></div>
                            <span class="ml-2">10</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="bg-white rounded-lg shadow-md p-4 flex justify-between items-center">
                <button class="text-gray-600 mr-2">Prev</button>
                <div class="flex space-x-2">
                    <a href="#" class="bg-gray-200 rounded-full w-8 h-8 flex items-center justify-center">1</a
                        href="#">
                    <a href="#" class="text-gray-600  rounded-full w-8 h-8 flex items-center justify-center">2</a
                        href="#">
                    <a href="#" class="text-gray-600  rounded-full w-8 h-8 flex items-center justify-center">3</a
                        href="#">
                    <a href="#" class="text-gray-600  rounded-full w-8 h-8 flex items-center justify-center">4</a
                        href="#">
                    <a href="#" class="text-gray-600  rounded-full w-8 h-8 flex items-center justify-center">5</a
                        href="#">
                    <a href="#" class="text-gray-600  rounded-full w-8 h-8 flex items-center justify-center">6</a
                        href="#">
                    <a href="#" class="text-gray-600  rounded-full w-8 h-8 flex items-center justify-center">7</a
                        href="#">
                    <a href="#" class="text-gray-600">Next</a>
                </div>
            </div>
        </div>
    </div>
@endsection
