<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Zeeva Nails') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative min-h-screen bg-[#FEEDF8] overflow-x-hidden font-sans text-gray-900 antialiased">

    <!-- Navbar -->
    <x-navbar />

    <!-- Auth Content -->
    <main class="flex pt-60 pb-60 justify-center items-center min-h-[70vh] px-4">
        <div class="w-full max-w-md bg-white/80 backdrop-blur-md shadow-lg rounded-2xl p-8">
            {{ $slot }}
        </div>
    </main>

    <!-- Footer -->
    <x-footer />

</body>
</html>
