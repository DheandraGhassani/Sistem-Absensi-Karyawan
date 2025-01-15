<!DOCTYPE html>
<html lang="en">

<head>

    @php

        use Carbon\Carbon;

        $employee = Auth::user()->employee->first();

        // Daftar status yang diinginkan
        $statuses = ['Hadir', 'Sakit', 'Izin', 'Absen'];

        // Mendapatkan bulan dan tahun saat ini
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $absensiCount = collect(); // Koleksi untuk menyimpan hasil

        foreach ($statuses as $status) {
            // Menghitung jumlah absensi berdasarkan status, bulan, dan tahun
            $count = DB::table('absensis')
                ->where('employee_id', $employee->id)
                ->where('status', $status)
                ->whereMonth('date_absensi', $currentMonth)
                ->whereYear('date_absensi', $currentYear)
                ->count();

            $absensiCount->push([
                'status' => $status,
                'total' => $count,
            ]);
        }
    @endphp

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OnTime</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        #map {
            height: 300px;
            /* Set the height for the map */
        }

        /* Modal styles */
        /* Modal styles */
        .modal {
            flex-flow: column;
            display: flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .modal.show {
            opacity: 1;
            visibility: visible;
        }

        .modal-header {
            /* background: #86DED7; */
            background: #E8E7EB;
            color: #535353;
            padding: 15px;
            width: 100%;
            max-width: 500px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            font-weight: bold;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.2);
        }

        .modal-content {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            max-width: 500px;
            width: 100%;
            text-align: center;
            border-radius: 0 0 10px 10px;
            /* Rounded bottom corners */
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-close {
            cursor: pointer;
            color: #f28300;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body class="min-h-screen">
    <!-- Modal -->


    <nav
        class="h-[150px] bg-[#86DED7] rounded-bl-[50px] rounded-br-[50px] flex flex-row  justify-between px-10 items-center">
        @if (isset($backMenu) && $backMenu)
            <a href="{{ url('/dashboard') }}" class="text-decoration-none">
                <i class="fas fa-arrow-left text-white"></i>
            </a>
        @else
            <h3 class="font-bold text-2xl text-[#535353]">07:24 AM</h3>
        @endif
        <div>
            @yield('navmenu')
        </div>
        <a href="/dashboard/setting" class="">
            <i class="fa-regular fa-bell text-white text-4xl"></i>
        </a>
    </nav>

    @if (isset($showCard) && $showCard)
        <div class="flex justify-center">
            <div class="bg-white px-4 py-6 shadow-lg w-[60%] mt-3 mx-auto -translate-y-[120px] rounded-[50px]">
                <img src="/assets/images/profile-default.png" class="mx-auto" alt="">
                <p class="text-center text-[#057DD4] border border-[#057DD4] rounded-lg w-20 mx-auto my-2 text-sm">
                    Manager
                </p>
                <p class="font-bold text-[#F28300] text-xl text-center">Rafi Ramadhan Sudirman</p>
                <p class="font-bold text-black text-lg text-center">
                    {{ \Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>

                <hr class="border-dashed border-black my-4">
                <div class="flex flex-row justify-evenly flex-wrap">
                    @foreach ($absensiCount as $absensi)
                        <div>
                            <p class="text-black font-medium text-md text-center">{{ $absensi['status'] }}</p>
                            <p
                                class="font-bold text-md text-center
                                @if ($absensi['status'] == 'Hadir') text-green-700
                                @elseif($absensi['status'] == 'Sakit') text-blue
                                @elseif($absensi['status'] == 'Izin') text-[#F28300]
                                @else text-red-600 @endif">
                                {{ $absensi['total'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <script src="/node_modules/preline/dist/preline.js"></script>

    <!-- Map and History Section -->
    @yield('content')

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialize the map with a default view (fallback)
        var map = L.map('map').setView([-7.250445, 112.768845], 13); // Default coordinates

        // Add OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Function to handle successful geolocation
        function onLocationFound(e) {
            var lat = e.coords.latitude;
            var lng = e.coords.longitude;

            // Update map view to current location
            map.setView([lat, lng], 13);

            // Add a marker at the current location
            L.marker([lat, lng]).addTo(map)
                .bindPopup('You are here')
                .openPopup();
        }

        // Function to handle geolocation errors
        function onLocationError(error) {
            console.error('Geolocation error: ', error.message);
            alert('Unable to retrieve your location. Default location is shown.');
        }

        // Check if geolocation is available
        if (navigator.geolocation) {
            // Get the current position
            navigator.geolocation.getCurrentPosition(onLocationFound, onLocationError);
        } else {
            alert('Geolocation is not supported by your browser. Default location is shown.');
        }
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @elseif (session('error'))
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            @endif

            @if ($errors->any())
                Swal.fire({
                    title: 'Validation Error!',
                    text: '{{ $errors->first() }}', // Menampilkan pesan error pertama
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>


</body>

</html>
