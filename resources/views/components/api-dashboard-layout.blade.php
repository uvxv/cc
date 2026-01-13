<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel API Token Manager</title>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-gray-50">

    <!-- Top Navigation Bar -->
    <nav class="bg-gray-900 border-b border-gray-800">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center gap-2">
                        <img class="h-8 w-8" src="{{ asset('storage/app/logo.jpg') }}" alt="TokenGuard Logo">
                        <span class="text-white font-bold text-xl tracking-tight">TokenManagement</span>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-10 flex items-baseline space-x-4">
                            <!-- Tab Triggers -->
                            <a href="{{route('token.index')}}">
                            <button  id="tab-btn-list" class="{{ Route::is('token.index') ? 'bg-gray-800' : '' }} text-white rounded-md px-3 py-2 text-sm font-medium transition-colors" aria-current="page">My Tokens</button>
                            </a>
                            <a href="{{route('token.create')}}">
                            <button  id="tab-btn-create" class="{{ Route::is('token.create') ? 'bg-gray-800' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium transition-colors">Create Token</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Profile / Right Section -->
                <div class="hidden md:block">
                    <div class="ml-4 flex items-center md:ml-6">
                        <div class="relative ml-3">
                            <div class="flex items-center gap-3">
                                <span class="text-sm font-medium text-gray-300">Student Dev</span>
                                <img class="h-8 w-8 rounded-full bg-gray-800" src="https://api.dicebear.com/7.x/avataaars/svg?seed=Felix" alt="">
                                <form method="POST" action="{{ route('token.logout') }}">
                                    @csrf
                                    <button type="submit" class="ml-2 inline-flex items-center rounded-md bg-gray-800 text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 text-sm font-medium">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Mobile menu button -->
                <div class="-mr-2 flex md:hidden">
                    <button type="button" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="sr-only">Open main menu</span>
                        <i data-lucide="menu" class="h-6 w-6"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="hidden md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
                <button onclick="switchTab('list')" class="block w-full text-left bg-gray-900 text-white rounded-md px-3 py-2 text-base font-medium">My Tokens</button>
                <button onclick="switchTab('create')" class="block w-full text-left text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-base font-medium">Create Token</button>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="mx-auto max-w-7xl py-10 px-4 sm:px-6 lg:px-8">

        {{ $slot }}

    </main>


</body>
</html>