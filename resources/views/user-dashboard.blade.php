<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Licensing Dashboard</title>
    <!-- Tailwind CSS (CDN for preview only - use 'npm run dev' in Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-[#1C1C1C] font-sans antialiased">

    <!-- Top Navigation -->
    <nav class="bg-[#0E3CBD] shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center text-white font-bold text-xl tracking-tight">
                        <!-- Icon: Credit Card -->
                        <svg class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        E-Licensing
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <form method="POST" action="{{ route('login.logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-sm text-white bg-white/10 hover:bg-white/20 px-3 py-1 rounded-md transition">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-brand-dark">Hello {{ session('name') }}!</h1>
            <p class="text-brand-gray font-bold mt-1 text-sm">Manage your digital license and traffic fines.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left Column: Driving License -->
            <div class="lg:col-span-7 space-y-6">
                
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold text-brand-dark flex items-center">
                            <!-- Icon: Badge Check -->
                            <svg class="w-5 h-5 mr-2 text-brand-blue" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                            Digital Driving License
                        </h2>
                        
                        <!-- 
                            {{-- BLADE LOGIC: @if($hasLicense)  --}}
                        -->
                        <button onclick="document.getElementById('qr-modal').classList.remove('hidden')" class="text-brand-blue text-sm font-medium hover:text-brand-light flex items-center transition">
                                
                                <svg class="w-4 h-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M4 4h6v6H4V4Zm10 10h6v6h-6v-6Zm0-10h6v6h-6V4Zm-4 10h.01v.01H10V14Zm0 4h.01v.01H10V18Zm-3 2h.01v.01H7V20Zm0-4h.01v.01H7V16Zm-3 2h.01v.01H4V18Zm0-4h.01v.01H4V14Z"/>
                                <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M7 7h.01v.01H7V7Zm10 10h.01v.01H17V17Z"/>
                                </svg>

                            Show QR
                        </button>
                        {{-- <!-- BLADE: @endif --> --}}
                    </div>

                    <!-- Card Wrapper -->
                    <div class="relative w-full max-w-md mx-auto aspect-[1.586/1] rounded-xl shadow-2xl overflow-hidden transition-all duration-500">
                        
                        <!-- 
                            {{-- BLADE LOGIC: @if(!$hasLicense)  --}}
                            Change 'hidden' to 'flex' below if NO license is found
                        -->
                        <div id="no-license-overlay" class="hidden absolute inset-0 z-20 flex-col items-center justify-center bg-white/30 backdrop-blur-sm transition-all duration-300">
                            <div class="bg-white p-6 rounded-xl shadow-xl text-center max-w-xs w-full mx-4 border border-gray-100">
                                <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 text-brand-gray">
                                    <!-- Icon: File X -->
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h3 class="font-bold text-brand-dark mb-1">No License Detected</h3>
                                <p class="text-xs text-brand-muted mb-4">Link an existing physical card or apply for a new learner's permit.</p>
                                
                                <div class="space-y-2">
                                    <button class="w-full bg-brand-blue hover:bg-blue-700 text-white text-sm font-medium py-2.5 rounded-lg transition shadow-md shadow-brand-blue/20">
                                        Add Physical Card
                                    </button>
                                    <button class="w-full bg-white hover:bg-gray-50 text-brand-dark border border-gray-200 text-sm font-medium py-2.5 rounded-lg transition">
                                        Apply Online
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- 
                            BLADE LOGIC: 
                            {{-- Add class 'license-blur' to the div below if @if(!$hasLicense)  --}}
                        -->
                        <div class="w-full h-full relative p-5 sm:p-6 text-white flex flex-col justify-between bg-gradient-to-br from-[#0E3CBD] to-[#06216e]">
                            
                            <!-- Background Decoration -->
                            <div class="absolute top-0 right-0 w-48 h-48 bg-white opacity-5 rounded-full -mt-10 -mr-10 blur-2xl"></div>
                            
                            <!-- Header -->
                            <div class="flex justify-between items-start z-10">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 border-2 border-white/20 rounded-full flex items-center justify-center bg-white/10">
                                        <span class="font-serif font-bold text-sm">LK</span>
                                    </div>
                                    <div>
                                        <div class="text-[10px] sm:text-xs opacity-80 uppercase tracking-wider">Republic of Sri Lanka</div>
                                        <div class="text-sm sm:text-lg font-bold leading-tight">Driving License</div>
                                    </div>
                                </div>
                                <div class="flex gap-1">
                                    <span class="px-1.5 py-0.5 rounded bg-white/20 text-[10px] font-bold border border-white/10">A</span>
                                    <span class="px-1.5 py-0.5 rounded bg-white/20 text-[10px] font-bold border border-white/10">B</span>
                                    <span class="px-1.5 py-0.5 rounded bg-white/20 text-[10px] font-bold border border-white/10">B1</span>
                                </div>
                            </div>

                            <!-- Chip & Number -->
                            <div class="flex justify-between items-center my-2 z-10">
                                <div class="w-10 h-8 bg-gradient-to-br from-yellow-200 to-yellow-500 rounded-md shadow-inner border border-yellow-600/30 opacity-90"></div>
                                <div class="text-right">
                                    <div class="text-[9px] uppercase opacity-70">License No</div>
                                    <div class="font-mono text-lg tracking-widest font-bold shadow-black drop-shadow-sm">B1234567</div>
                                </div>
                            </div>

                            <!-- User Details -->
                            <div class="grid grid-cols-3 gap-2 z-10 mt-auto">
                                <div class="col-span-2">
                                    <div class="text-[9px] uppercase opacity-70">Name</div>
                                    <div class="font-semibold text-sm sm:text-base truncate">A. B. PERERA</div>
                                </div>
                                <div class="col-span-1">
                                    <!-- Photo Placeholder -->
                                    <div class="w-12 h-14 bg-gray-200/20 rounded border border-white/30 ml-auto"></div>
                                </div>
                                <div>
                                    <div class="text-[9px] uppercase opacity-70">Issued</div>
                                    <div class="text-xs font-medium">2023.01.01</div>
                                </div>
                                <div>
                                    <div class="text-[9px] uppercase opacity-70">Expires</div>
                                    <div class="text-xs font-medium">2033.01.01</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-6 flex justify-center text-xs text-brand-muted text-center">
                        <p class="max-w-xs">This digital license is legally recognized by the Sri Lanka Police Department under the E-Motoring Act of 2024.</p>
                    </div>
                </div>
            </div>

            <!-- Right Column: Stats & Penalties -->
            <div class="lg:col-span-5 space-y-6">
                
                <!-- Quick Stats -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-center items-center text-center group hover:border-brand-blue/30 transition cursor-pointer">
                        <div class="w-10 h-10 bg-blue-50 text-brand-blue rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition">
                            <!-- Icon: History -->
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-brand-dark">Renewals</span>
                        <span class="text-xs text-brand-muted">Due in 8 yrs</span>
                    </div>
                    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-center items-center text-center group hover:border-brand-blue/30 transition cursor-pointer">
                        <div class="w-10 h-10 bg-green-50 text-green-600 rounded-full flex items-center justify-center mb-2 group-hover:scale-110 transition">
                            <!-- Icon: Check Circle -->
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="text-sm font-semibold text-brand-dark">Points</span>
                        <span class="text-xs text-brand-muted">20/20 Merits</span>
                    </div>
                </div>

                <!-- 
                   {{-- BLADE LOGIC: @if($hasLicense && count($fines) > 0)  --}}
                -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-4 border-b border-gray-50 flex justify-between items-center">
                        <h3 class="font-semibold text-brand-dark text-sm flex items-center">
                            <!-- Icon: Alert -->
                            <svg class="w-4 h-4 mr-2 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            Traffic Fines & Penalties
                        </h3>
                        <span class="bg-orange-100 text-orange-700 text-[10px] px-2 py-0.5 rounded-full font-bold">1 Active</span>
                    </div>
                    
                    <div class="divide-y divide-gray-50">
                        <!-- Item 1: Pending -->
                        <div class="p-4 hover:bg-gray-50 transition">
                            <div class="flex justify-between items-start mb-1">
                                <span class="text-xs font-bold text-brand-dark">Speeding (60-80kmph)</span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-yellow-100 text-yellow-700">Pending</span>
                            </div>
                            <div class="flex justify-between items-end">
                                <div>
                                    <div class="text-[10px] text-brand-muted">Loc: Colombo 03 • 24 Nov 2025</div>
                                    <div class="text-[10px] text-brand-muted">Ref: #SLP-99283</div>
                                </div>
                                <button class="text-xs bg-brand-dark text-white px-3 py-1.5 rounded hover:bg-black transition">Pay 3,000 LKR</button>
                            </div>
                        </div>

                        <!-- Item 2: Processed -->
                        <div class="p-4 hover:bg-gray-50 transition opacity-60">
                            <div class="flex justify-between items-start mb-1">
                                <span class="text-xs font-bold text-brand-gray">Illegal Parking</span>
                                <span class="text-[10px] font-bold px-2 py-0.5 rounded bg-green-100 text-green-700 flex items-center">
                                    <!-- Icon: Check -->
                                    <svg class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    Paid
                                </span>
                            </div>
                            <div class="text-[10px] text-brand-muted">Loc: Kandy • 12 Aug 2024</div>
                        </div>
                    </div>
                    
                    <div class="p-3 bg-gray-50 text-center border-t border-gray-100">
                        <a href="#" class="text-xs font-medium text-brand-blue hover:text-brand-dark transition">View all history &rarr;</a>
                    </div>
                </div>
                {{-- <!-- BLADE LOGIC: @endif --> --}}
            </div>
        </div>
    </main>

    <!-- QR Modal -->
    <div id="qr-modal" class="hidden fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl p-6 w-full max-w-sm relative">
            <button onclick="document.getElementById('qr-modal').classList.add('hidden')" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            
            <div class="text-center">
                <h3 class="text-lg font-bold text-brand-dark mb-1">Scan for Verification</h3>
                <p class="text-xs text-brand-muted mb-6">Show this QR code to the traffic officer.</p>
                
                <div class="bg-white p-4 rounded-xl border-2 border-dashed border-brand-blue/30 inline-block mb-4">
                    <!-- Placeholder QR SVG -->
                    <svg class="w-48 h-48 text-brand-dark" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M3 3h6v6H3V3zm2 2v2h2V5H5zm8-2h6v6h-6V3zm2 2v2h2V5h-2zM3 15h6v6H3v-6zm2 2v2h2v-2H5zm13-2h3v2h-3v-2zm-3 2h2v2h-2v-2zm3 2h3v2h-3v-2zm-3 2h2v2h-2v-2zM10 3h2v2h-2V3zm0 5h2v2h-2V8zm0 5h2v2h-2v-2zm0 5h2v2h-2v-2z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</body>
</html>