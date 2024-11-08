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
                <input type="date" class="px-4 py-2 border border-gray-500 rounded-lg">
            </div>

            <div id="dropZone" class="flex justify-center border border-blue-600 rounded-lg py-32 px-10">
                <img id="uploadedImage" src="/assets/images/upload.png" alt="" class=" object-contain" />
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
                    <h2 class="text-[#F28300] font-bold text-2xl">Pengajuan Cuti</h2>

                    <div class="w-80 flex flex-col bg-white border shadow-lg rounded-xl overflow-hidden mt-5">
                        <div class="p-3 space-y-0.5">
                            <div class="grid grid-cols-5 items-center gap-x-3 mx-1.5 pb-3">
                                <div class="col-span-1">
                                    <button type="button"
                                        class="size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100  :hover:bg-neutral-800 :focus:bg-neutral-800"
                                        aria-label="Previous">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m15 18-6-6 6-6" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="col-span-3 flex justify-center items-center gap-x-1">
                                    <div class="relative">
                                        <select
                                            data-hs-select='{
                                    "placeholder": "Select month",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] :text-neutral-200 :hover:text-blue-500 :focus:text-blue-500",
                                    "dropdownClasses": "mt-2 z-50 w-32 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 :[&::-webkit-scrollbar-track]:bg-neutral-700 :[&::-webkit-scrollbar-thumb]:bg-neutral-500 :bg-neutral-900 :border-neutral-700",
                                    "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 :bg-neutral-900 :hover:bg-neutral-800 :text-neutral-200 :focus:bg-neutral-800",
                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 :text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
                                  }'
                                            class="hidden text-gray-800">
                                            <option value="0">January</option>
                                            <option value="1">February</option>
                                            <option value="2">March</option>
                                            <option value="3">April</option>
                                            <option value="4">May</option>
                                            <option value="5">June</option>
                                            <option value="6" selected>July</option>
                                            <option value="7">August</option>
                                            <option value="8">September</option>
                                            <option value="9">October</option>
                                            <option value="10">November</option>
                                            <option value="11">December</option>
                                        </select>
                                    </div>
                                    <span class="text-gray-800 ">/</span>
                                    <div class="relative text-gray-800">
                                        <select
                                            data-hs-select='{
                                    "placeholder": "Select year",
                                    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative flex text-nowrap w-full cursor-pointer text-start font-medium text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600 before:absolute before:inset-0 before:z-[1] :text-neutral-200 :hover:text-blue-500 :focus:text-blue-500",
                                    "dropdownClasses": "mt-2 z-50 w-20 max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 :[&::-webkit-scrollbar-track]:bg-neutral-700 :[&::-webkit-scrollbar-thumb]:bg-neutral-500 :bg-neutral-900 :border-neutral-700",
                                    "optionClasses": "p-2 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 :bg-neutral-900 :hover:bg-neutral-800 :text-neutral-200 :focus:bg-neutral-800",
                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-gray-800 :text-neutral-200\" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>"
                                  }'
                                            class="hidden">
                                            <option selected>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                            <option>2026</option>
                                            <option>2027</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-1 flex justify-end">
                                    <button type="button"
                                        class=" size-8 flex justify-center items-center text-gray-800 hover:bg-gray-100 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 "
                                        aria-label="Next">
                                        <svg class="shrink-0 size-4" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="m9 18 6-6-6-6" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex pb-1.5">
                                <span class="m-px w-10 block text-center text-sm text-gray-500 :text-neutral-500">
                                    Mo
                                </span>
                                <span class="m-px w-10 block text-center text-sm text-gray-500 :text-neutral-500">
                                    Tu
                                </span>
                                <span class="m-px w-10 block text-center text-sm text-gray-500 :text-neutral-500">
                                    We
                                </span>
                                <span class="m-px w-10 block text-center text-sm text-gray-500 :text-neutral-500">
                                    Th
                                </span>
                                <span class="m-px w-10 block text-center text-sm text-gray-500 :text-neutral-500">
                                    Fr
                                </span>
                                <span class="m-px w-10 block text-center text-sm text-gray-500 :text-neutral-500">
                                    Sa
                                </span>
                                <span class="m-px w-10 block text-center text-sm text-gray-500 :text-neutral-500">
                                    Su
                                </span>
                            </div>
                            <div class="flex">
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200"
                                        disabled>
                                        26
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200"
                                        disabled>
                                        27
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200"
                                        disabled>
                                        28
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200"
                                        disabled>
                                        29
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200"
                                        disabled>
                                        30
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        1
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        2
                                    </button>
                                </div>
                            </div>
                            <div class="flex">
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        3
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        4
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        5
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        6
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        7
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        8
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        9
                                    </button>
                                </div>
                            </div>
                            <div class="flex">
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        10
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        11
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        12
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        13
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        14
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        15
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        16
                                    </button>
                                </div>
                            </div>
                            <div class="flex">
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        17
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        18
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        19
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center bg-blue-600 border border-transparent text-sm font-medium text-white hover:border-blue-600 rounded-full :bg-blue-500 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 :hover:border-neutral-700">
                                        20
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        21
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        22
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        23
                                    </button>
                                </div>
                            </div>
                            <div class="flex">
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        24
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        25
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        26
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        27
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        28
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        29
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        30
                                    </button>
                                </div>
                            </div>
                            <div class="flex">
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 rounded-full hover:border-blue-600 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:border-blue-600 focus:text-blue-600 :text-neutral-200">
                                        31
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 :text-neutral-200 :hover:border-neutral-500 :focus:bg-neutral-700"
                                        disabled>
                                        1
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 :text-neutral-200 :hover:border-neutral-500 :focus:bg-neutral-700"
                                        disabled>
                                        2
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 :text-neutral-200 :hover:border-neutral-500 :focus:bg-neutral-700"
                                        disabled>
                                        3
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 :text-neutral-200 :hover:border-neutral-500 :focus:bg-neutral-700"
                                        disabled>
                                        4
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 :text-neutral-200 :hover:border-neutral-500 :focus:bg-neutral-700"
                                        disabled>
                                        5
                                    </button>
                                </div>
                                <div>
                                    <button type="button"
                                        class="m-px size-10 flex justify-center items-center border border-transparent text-sm text-gray-800 hover:border-blue-600 hover:text-blue-600 rounded-full disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 :text-neutral-200 :hover:border-neutral-500 :focus:bg-neutral-700"
                                        disabled>
                                        6
                                    </button>
                                </div>
                            </div>
                            <!-- Days -->
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

                    <img src="/assets/images/profile-default.png" class="cursor-pointer" id="lampiranFoto"
                        class="mt-4" alt="">
                    <div class="mt-2 flex gap-4">
                        <button class="px-8 py-4 bg-[#F84136] text-white text-sm rounded-md">Batal</button>
                        <button class="px-8 py-4 bg-[#4CF639] text-white text-sm rounded-md">Ajukan</button>
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

        dropZone.addEventListener('drop', (event) => {
            event.preventDefault();
            dropZone.classList.remove('border-blue-800');

            const files = event.dataTransfer.files;
            if (files.length > 0) {
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
    </script>


    <script>
        document.getElementById('lampiranFoto').addEventListener('click', function() {
            document.getElementById('modalLampiran').classList.add('show')

        })


        function closeModal() {
            const modalLampiran = document.getElementById('modalLampiran')
            modalLampiran.classList.remove('show')
        }

        function ajukan() {
            const srcImage = document.getElementById('uploadedImage').src
            const previewImage = document.getElementById('lampiranFoto')
            previewImage.src = srcImage;
            previewImage.classList.add('h-20')
            closeModal()
        }
    </script>
@endsection
