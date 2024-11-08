@extends('layouts.user', ['showCard' => false, 'backMenu' => true])

@section('navmenu')
    <h1 class="text-2xl font-bold text-[#5B5353]">Laporan Cuti</h1>
@endsection

@section('content')
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

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

    <div class="grid grid-cols-3 gap-6 mt-4 pb-11">
        <!-- This week card -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">This week</h2>
            <div class="w-full h-2 bg-gray-200 rounded-full mb-6">
                <div class="h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 80%;"></div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col items-center">
                    <div class="relative w-24 h-24">
                        <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                            <path class="text-gray-200"
                                d="M18 2.0845a15.9155 15.9155 0 1 0 0 31.831 15.9155 15.9155 0 1 0 0-31.831" fill="none"
                                stroke-width="2" stroke="currentColor" />
                            <path class="text-teal-500" d="M18 2.0845a15.9155 15.9155 0 0 1 0 31.831" fill="none"
                                stroke-width="2" stroke="currentColor" stroke-dasharray="80, 100" />
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center text-xl font-semibold">6/7</div>
                    </div>
                    <p class="mt-2">Sakit</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="relative w-24 h-24">
                        <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                            <path class="text-gray-200"
                                d="M18 2.0845a15.9155 15.9155 0 1 0 0 31.831 15.9155 15.9155 0 1 0 0-31.831" fill="none"
                                stroke-width="2" stroke="currentColor" />
                            <path class="text-teal-500" d="M18 2.0845a15.9155 15.9155 0 0 1 0 31.831" fill="none"
                                stroke-width="2" stroke="currentColor" stroke-dasharray="60, 100" />
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center text-xl font-semibold">4/7</div>
                    </div>
                    <p class="mt-2">Absen</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="relative w-24 h-24">
                        <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                            <path class="text-gray-200"
                                d="M18 2.0845a15.9155 15.9155 0 1 0 0 31.831 15.9155 15.9155 0 1 0 0-31.831" fill="none"
                                stroke-width="2" stroke="currentColor" />
                            <path class="text-teal-500" d="M18 2.0845a15.9155 15.9155 0 0 1 0 31.831" fill="none"
                                stroke-width="2" stroke="currentColor" stroke-dasharray="40, 100" />
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center text-xl font-semibold">3/7</div>
                    </div>
                    <p class="mt-2">Cuti</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="relative w-24 h-24">
                        <svg class="absolute top-0 left-0 w-full h-full" viewBox="0 0 36 36">
                            <path class="text-gray-200"
                                d="M18 2.0845a15.9155 15.9155 0 1 0 0 31.831 15.9155 15.9155 0 1 0 0-31.831" fill="none"
                                stroke-width="2" stroke="currentColor" />
                            <path class="text-teal-500" d="M18 2.0845a15.9155 15.9155 0 0 1 0 31.831" fill="none"
                                stroke-width="2" stroke="currentColor" stroke-dasharray="20, 100" />
                        </svg>
                        <div class="absolute inset-0 flex items-center justify-center text-xl font-semibold">2/7</div>
                    </div>
                    <p class="mt-2">Libur</p>
                </div>
            </div>
        </div>

        <!-- 2022 card -->
        <div class="bg-white p-6 rounded-lg shadow-md border-2 border-blue-500 relative">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">2022</h2>
                <div class="dropdown relative">
                    <button class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full">last year <i
                            class="fas fa-chevron-down ml-1"></i></button>
                    <div
                        class="dropdown-content absolute right-0 mt-2 rounded-lg shadow-lg bg-white w-[400px] py-2 -translate-y-5">
                        <h3 class="text-center font-bold text-2xl text-[#333333]">Year</h3>
                        @php
                            $years = [2024, 2023, 2022, 2021];
                        @endphp

                        @foreach ($years as $item)
                            <a href="/dashboard/laporan-bulanan/{{ $item }}"
                                class="text-center font-medium text-2xl text-[#333333] my-4">{{ $item }}</a>
                            <hr class="border-t border-[#88BEB780] h-px mx-4">
                        @endforeach

                        <div class="flex justify-center mt-2"> <!-- Flex container untuk tombol -->
                            <button class="font-bold text-xl text-[#333333] bg-[#86DED7] px-4 py-2 rounded-lg">Input
                                Year</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-2">
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Jan</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 40%;"></div>
                    </div>
                    <span>10</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Feb</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 60%;"></div>
                    </div>
                    <span>15</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Mar</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 50%;"></div>
                    </div>
                    <span>12</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Apr</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 70%;"></div>
                    </div>
                    <span>14</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>May</span>
                        <div class="w-2/3 h-2 bg-gray-200 rounded-full"></div>
                    </div>
                    <span>0</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Jun</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 10%;"></div>
                    </div>
                    <span>2</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>July</span>
                        <div class="w-2/3 h-2 bg-gray-200 rounded-full"></div>
                    </div>
                    <span>0</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Aug</span>
                        <div class="w-2/3 h-2 bg-gray-200 rounded-full"></div>
                    </div>
                    <span>0</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Sept</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 10%;"></div>
                    </div>
                    <span>2</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Oct</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 55%;"></div>
                    </div>
                    <span>11</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Nov</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 10%;"></div>
                    </div>
                    <span>2</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Dec</span>
                        <div class="w-2/3 h-2 bg-gray-200 rounded-full"></div>
                    </div>
                    <span>0</span>
                </div>
            </div>
        </div>

        <!-- Accuracy card -->
        <div class="flex flex-col gap-7">
            <div class="bg-white p-6 rounded-lg shadow-md relative">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Accuracy</h2>
                    <div class="dropdown relative">
                        <button class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full">last week <i
                                class="fas fa-chevron-down ml-1"></i></button>
                        <div class="dropdown-content absolute right-0 mt-2 rounded-lg shadow-lg bg-white -translate-y-5">
                            <a href="#">Option 1</a>
                            <a href="#">Option 2</a>
                            <a href="#">Option 3</a>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between items-end h-32">
                    <div class="w-4 bg-gradient-to-b from-[#88BEB7] to-[#63A697]" style="height: 20%;"></div>
                    <div class="w-4 bg-gradient-to-b from-[#88BEB7] to-[#63A697]" style="height: 80%;"></div>
                    <div class="w-4 bg-gradient-to-b from-[#88BEB7] to-[#63A697]" style="height: 40%;"></div>
                    <div class="w-4 bg-gradient-to-b from-[#88BEB7] to-[#63A697]" style="height: 60%;"></div>
                    <div class="w-4 bg-gradient-to-b from-[#88BEB7] to-[#63A697]" style="height: 100%;"></div>
                </div>
            </div>

            <!-- January card -->
            <div class="bg-white p-6 rounded-lg shadow-md relative">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">January</h2>
                    <div class="dropdown relative">
                        <button class="bg-gray-200 text-gray-600 px-3 py-1 rounded-full">last month <i
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
            </div>
            <div class="space-y-2">
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-3">
                        <span>mon</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 30%;"></div>
                    </div>
                    <span>3</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>tue</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 20%;"></div>
                    </div>
                    <span>2</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-4">
                        <span>wed</span>
                        <div class="w-2/3 h-2 bg-gray-200 rounded-full"></div>
                    </div>
                    <span>0</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>thu</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 20%;"></div>
                    </div>
                    <span>2</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-7">
                        <span>fri</span>
                        <div class="w-2/3 h-2 bg-gray-200 rounded-full"></div>
                    </div>
                    <span>0</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex w-full items-center gap-5">
                        <span>Sat</span>
                        <div class="w-2/3 h-2 bg-gradient-to-r from-[#88BEB7] to-[#63A697] rounded-full" style="width: 10%;"></div>
                    </div>
                    <span>1</span>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
