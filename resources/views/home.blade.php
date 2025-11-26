<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - E-Licensing Sri Lanka</title>
    <link href="{{ asset('vendor/bladewind/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
    <!-- Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-[#1C1C1C] flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-[#0E3CBD] text-white shadow-lg">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <!-- Heroicon: Identification -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                </svg>
                <span class="text-2xl font-bold tracking-wide">E Licensing</span>
            </div>
            
            <nav>
                @if (!Auth::check())
                    <a href="{{ route('login.index') }}" class="hover:bg-blue-400 text-sm font-bold hover:text-gray-200 transition">Login</a>
                    <a href="{{ route('register.index') }}" class="hover:bg-blue-400 text-sm font-bold hover:text-gray-200 transition">Register</a>
                @endif
                <!-- Static Preview Link -->
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <x-home-section-one>
    </x-home-section-one>

    <!-- Features / Benefits Grid -->
    <x-home-section-two>
    </x-home-section-two>

    <!-- Auth Section / CTA -->
    <x-home-section-three>
    </x-home-section-three>

    <!-- Footer -->
    <x-home-footer>
    </x-home-footer>
    <script src="{{ asset('vendor/bladewind/js/helpers.js') }}"></script>
</body>
</html>