<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Licensing Registration - Sri Lanka</title>
    <link rel="icon" type="image/jpg" href="{{ asset('storage/app/logo.jpg') }}" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])  
    <!-- Inter Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 text-[#1C1C1C] antialiased h-screen flex overflow-hidden">

    <!-- Left Side: Visual/Branding (Hidden on Mobile) -->
    <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-[#0E3CBD] to-[#259FDE] relative items-center justify-center overflow-hidden">
        <!-- Abstract Decoration -->
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-white opacity-10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/4 right-10 w-64 h-64 bg-[#259FDE] opacity-20 rounded-full blur-2xl"></div>

        <div class="relative text-center px-12 text-white">
        <div class="mb-6 w-full md:w-96 lg:w-96 flex items-center justify-center mx-auto">
            <x-card-illustration />
        </div>
            <h2 class="text-4xl font-bold tracking-tight mb-4">E-Licensing Portal</h2>
            <p class="text-lg text-blue-100 font-light">
                Democratic Socialist Republic of Sri Lanka
            </p>
            <div class="mt-8 border-t border-blue-400/30 pt-8">
                <p class="text-sm text-blue-100/80">
                    Secure access for vehicle revenue licensing, business permits, and regional compliance.
                </p>
            </div>
        </div>
    </div>

    <!-- Right Side: Form -->
    <div class="w-full lg:w-1/2 flex flex-col h-full bg-white relative">
        <!-- Mobile Header (Visible only on small screens) -->
        <div class="lg:hidden bg-[#0E3CBD] p-6 text-white flex items-center justify-between">
            <span class="font-bold text-lg">E-Licensing LK</span>
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
        </div>

        <div class="flex-1 overflow-y-auto p-6 md:p-12 lg:px-20">
            <div class="max-w-xl mx-auto">
                
                <!-- Form Header -->
                <div class="mb-10">
                    <h1 class="text-3xl font-bold text-[#0E3CBD] mb-2">Create Account</h1>
                    <p class="text-[#5E5E5E]">Please enter your details to register for the licensing system.</p>
                </div>
                @error('login_message')
                        <x-bladewind::alert
                            type="warning">
                            {{ $message }}
                        </x-bladewind::alert>
                @enderror

                <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf     
                    <!-- Name Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- First Name -->
                        <div class="space-y-2">
                            <label for="firstname" class="text-sm font-medium text-[#1C1C1C]">First Name <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#848484]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="firstname" name="firstname" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-[#0E3CBD] focus:ring-2 focus:ring-[#0E3CBD]/20 outline-none transition-all placeholder-[#848484] text-[#1C1C1C]"
                                    placeholder="Saman" value="{{ old('firstname') }}">
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="space-y-2">
                            <label for="lastname" class="text-sm font-medium text-[#1C1C1C]">Last Name <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#848484]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="lastname" name="lastname" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-[#0E3CBD] focus:ring-2 focus:ring-[#0E3CBD]/20 outline-none transition-all placeholder-[#848484] text-[#1C1C1C]"
                                    placeholder="Perera" value="{{ old('lastname') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Address (Optional) -->
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <label for="address" class="text-sm font-medium text-[#1C1C1C]">Residential Address</label>
                        </div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#848484]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" id="address" name="address"
                                class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-[#0E3CBD] focus:ring-2 focus:ring-[#0E3CBD]/20 outline-none transition-all placeholder-[#848484] text-[#1C1C1C]"
                                placeholder="No. 123, Galle Road, Colombo 03" value="{{ old('address') }}">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="space-y-2">
                        <label for="email" class="text-sm font-medium text-[#1C1C1C]">Email Address <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#848484]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                </svg>
                            </div>
                            <input type="email" id="email" name="email" required
                                class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-[#0E3CBD] focus:ring-2 focus:ring-[#0E3CBD]/20 outline-none transition-all placeholder-[#848484] text-[#1C1C1C]"
                                placeholder="name@example.lk" value="{{ old('email') }}">
                        </div>
                    </div>

                    <!-- NIC -->
                    <div class="space-y-2">
                        <label for="nic" class="text-sm font-medium text-[#1C1C1C]">Nic<span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#848484]">
                                <svg class="w-6 h-6 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="nic" name="nic" required
                                class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-[#0E3CBD] focus:ring-2 focus:ring-[#0E3CBD]/20 outline-none transition-all placeholder-[#848484] text-[#1C1C1C]"
                                placeholder="123456789" value="{{ old('nic') }}">
                        </div>
                    </div>                    

                    <!-- Password Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Password -->
                        <div class="space-y-2">
                            <label for="password" class="text-sm font-medium text-[#1C1C1C]">Password <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#848484]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="password" id="password" name="password" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-[#0E3CBD] focus:ring-2 focus:ring-[#0E3CBD]/20 outline-none transition-all placeholder-[#848484] text-[#1C1C1C]"
                                    placeholder="••••••••">
                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div class="space-y-2">
                            <label for="password_confirmation" class="text-sm font-medium text-[#1C1C1C]">Confirm Password <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#848484]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="password" id="password_confirmation" name="password_confirmation" required
                                    class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-200 focus:border-[#0E3CBD] focus:ring-2 focus:ring-[#0E3CBD]/20 outline-none transition-all placeholder-[#848484] text-[#1C1C1C]"
                                    placeholder="••••••••">
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <x-bladewind::alert
                            type="warning">
                            {{ $message }}
                        </x-bladewind::alert>
                    @enderror

                    <!-- Native Image Upload (No JS) -->
                    <div class="space-y-2">
                        <label for="id_image" class="text-sm font-medium text-[#1C1C1C]">NIC</label>
                        <div class="p-4 bg-white border border-gray-200 rounded-xl">
                            <input type="file" id="id_image" name="id_image" accept="image/*"
                                class="block w-full text-sm text-[#5E5E5E]
                                file:mr-4 file:py-2.5 file:px-4
                                file:rounded-lg file:border-0
                                file:text-sm file:font-semibold
                                file:bg-[#0E3CBD] file:text-white
                                hover:file:bg-[#259FDE]
                                file:transition-colors file:cursor-pointer
                                cursor-pointer"
                                required
                            />
                            <p class="mt-2 text-xs text-[#848484]">Formats: PNG, JPG or PDF (Max 5MB)</p>
                        </div>
                        @error('id_image')
                            <x-bladewind::alert
                                type="warning">
                                {{ $message }}
                            </x-bladewind::alert>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" 
                            class="w-full bg-[#0E3CBD] hover:bg-[#259FDE] text-white font-semibold py-3.5 px-4 rounded-lg shadow-lg shadow-[#0E3CBD]/30 transform transition-all duration-200 hover:-translate-y-0.5 focus:ring-4 focus:ring-[#0E3CBD]/40 focus:outline-none">
                            Register Account
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center">
                        <p class="text-sm text-[#5E5E5E]">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="font-semibold text-[#0E3CBD] hover:text-[#259FDE] transition-colors">Log in here</a>
                        </p>
                    </div>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="mt-12 text-center border-t border-gray-100 pt-8">
                <p class="text-xs text-[#848484]">&copy; 2025 E-Licensing Dept, Sri Lanka. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>