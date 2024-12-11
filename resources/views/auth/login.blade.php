<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | OnTime</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center min-h-screen">
    <div class="container flex flex-col md:flex-row items-center gap-8 md:gap-4 justify-center p-6  rounded-lg">
        <img src="/assets/images/logo_login.png" class="h-64 md:h-96 object-contain" alt="login image">

        <div class="w-full max-w-md bg-gray-50 p-8 rounded-lg ">
            <h3 class="text-3xl font-bold text-red-600 text-center mb-1">OnTime</h3>
            <p class="text-center text-gray-500 mb-4">Absensi Kehadiran</p>

            <h3 class="text-xl font-semibold text-black text-center mb-6">Login to Your Account</h3>

            <form class="space-y-4" method="POST" action="{{ route('authenticate') }}">

                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email*</label>
                    <input type="email" id="email" name="email" required
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password*</label>
                    <input type="password" id="password" name="password" required
                        class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                </div>

                <div class="flex flex-row gap-2">
                    <input type="checkbox" class="text-red-500">
                    <span for="" class="block text-sm font-medium text-gray-700">Remember me</span>
                </div>

                <button type="submit"
                    class="w-full py-2 px-4 bg-[#86DED7] text-white font-semibold rounded-lg shadow hover:bg-[#59938e] focus:outline-none focus:ring-2 focus:ring-[#59938e] focus:ring-opacity-50">
                    Login
                </button>

            </form>
        </div>
    </div>
</body>

</html>
