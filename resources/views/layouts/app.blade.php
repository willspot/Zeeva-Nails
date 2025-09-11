<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <title>{{ config('app.name', 'Zeeva Nails') }}</title>
    <style>
        [x-cloak] { display: none !important; }
    </style>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#FEEDF8]" x-data="{ sidebarOpen: false }">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside 
            class="fixed sm:relative inset-y-0 left-0 w-64 bg-white/90 backdrop-blur-md shadow-md p-6 transform transition-transform duration-300 z-40 sm:translate-x-0"
            :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }"
            >

            <div class="text-2xl font-bold text-[#922E71] mb-8">Zeeva Admin</div>

            <nav class="space-y-4" 
                 x-data="{ openServices: {{ request()->routeIs('admin.services.*') ? 'true' : 'false' }} }">

                <a href="{{ route('dashboard') }}" 
                   class="flex items-center space-x-2 px-3 py-2 rounded-lg transition 
                        {{ request()->routeIs('dashboard') ? 'bg-pink-100 text-[#922E71] font-semibold' : 'text-gray-700 hover:bg-pink-50 hover:text-[#922E71]' }}">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Services Dropdown -->
                <div>
                    <button @click="openServices = !openServices"
                        class="w-full flex items-center justify-between px-3 py-2 rounded-lg transition
                            {{ request()->routeIs('admin.services.*') ? 'bg-pink-100 text-[#922E71] font-semibold' : 'text-gray-700 hover:bg-pink-50 hover:text-[#922E71]' }}">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-briefcase"></i>
                            <span>Services</span>
                        </div>
                        <i :class="openServices ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="ml-2 text-xs"></i>
                    </button>

                    <div x-show="openServices" x-cloak class="ml-8 mt-2 space-y-2">
                        <a href="{{ route('admin.services.index') }}" 
                           class="block px-3 py-2 rounded-md text-sm transition 
                                  {{ request()->routeIs('admin.services.index') ? 'bg-pink-50 text-[#922E71] font-medium' : 'text-gray-600 hover:bg-pink-50 hover:text-[#922E71]' }}">
                            All Services
                        </a>
                        <a href="{{ route('admin.services.create') }}" 
                           class="block px-3 py-2 rounded-md text-sm transition 
                                  {{ request()->routeIs('admin.services.create') ? 'bg-pink-50 text-[#922E71] font-medium' : 'text-gray-600 hover:bg-pink-50 hover:text-[#922E71]' }}">
                            Add Service
                        </a>
                    </div>
                </div>

                <a href="{{ route('admin.bookings.index') }}" 
                   class="flex items-center space-x-2 px-3 py-2 rounded-lg transition 
                          {{ request()->routeIs('admin.bookings.*') ? 'bg-pink-100 text-[#922E71] font-semibold' : 'text-gray-700 hover:bg-pink-50 hover:text-[#922E71]' }}">
                    <i class="fas fa-calendar-check"></i>
                    <span>Bookings</span>
                </a>

                <a href="{{ route('profile.edit') }}" 
                   class="flex items-center space-x-2 px-3 py-2 rounded-lg transition 
                          {{ request()->routeIs('profile.edit') ? 'bg-pink-100 text-[#922E71] font-semibold' : 'text-gray-700 hover:bg-pink-50 hover:text-[#922E71]' }}">
                    <i class="fas fa-user"></i>
                    <span>Profile</span>
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="w-full flex items-center space-x-2 px-3 py-2 rounded-lg text-gray-700 hover:bg-pink-50 hover:text-[#922E71] transition">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <!-- Overlay (mobile only) -->
        <div 
            class="fixed inset-0 bg-black bg-opacity-40 z-30 sm:hidden" 
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            x-cloak></div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Bar -->
            <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <!-- Hamburger -->
                    <button class="sm:hidden text-gray-600" @click="sidebarOpen = !sidebarOpen">
                        <i class="fas fa-bars text-xl"></i>
                    </button>

                    <h1 class="text-xl font-semibold text-gray-800">
                        {{ $header ?? 'Dashboard' }}
                    </h1>
                </div>
                <div class="hidden sm:block text-gray-600">
                    Logged in as <span class="font-semibold text-[#922E71]">{{ Auth::user()->name }}</span>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Toast Notification -->
    @if(session('status') === 'logged-in')
        <div id="toast"
            class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-[#922E71] text-white px-6 py-3 rounded-lg shadow-lg text-sm font-medium z-50 transition duration-500">
            🎉 You're logged in!
        </div>
        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast');
                if (toast) {
                    toast.classList.add('opacity-0', '-translate-y-3');
                    setTimeout(() => toast.remove(), 500); // remove from DOM
                }
            }, 3000);
        </script>
    @endif

    @if(session('success'))
    <div id="popup" 
         class="fixed bottom-5 right-5 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg animate-bounce z-50">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('popup').style.display = 'none';
        }, 4000);
    </script>
@endif

@if(session('error'))
    <div id="popup" 
         class="fixed bottom-5 right-5 bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg animate-bounce z-50">
        {{ session('error') }}
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('popup').style.display = 'none';
        }, 4000);
    </script>
@endif


</body>
</html>
