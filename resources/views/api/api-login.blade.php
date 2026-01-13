<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="{{ asset('storage/app/logo.jpg') }}" />
    <title>Api Management</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>
<body class="bg-gray-50 text-[#1a1a1a] antialiased">

    <!-- Main Container: Centered horizontally and vertically -->
    <div class="min-h-screen flex items-center justify-center p-4">       
        <!-- Login Card -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6 sm:p-12 border border-gray-100">
            
            <!-- Header -->
            <div class="text-center space-y-2 mb-8">
                <h1 class="text-3xl font-bold tracking-tight text-[#1a1a1a]">
                    Welcome!
                </h1>               
                <p class="text-sm text-[#888888]">
                    Enter your credentials to access your account
                </p>
            </div>
            
            <!-- Form -->
            <form class="space-y-6" action="{{route('token.authenticate')}}" method="POST"> 
                @csrf
                <!-- NIC Field -->
                <div class="space-y-2">
                    <label for="nic" class="text-sm font-semibold text-[#1a1a1a]">Access ID</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <!-- Icon: Credit Card -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            id="access_id" 
                            name="access_id" 
                            placeholder="Enter your Access ID" 
                            class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-xl text-[#1a1a1a] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#0044cc] focus:border-transparent transition duration-200 ease-in-out bg-gray-50 hover:bg-white"
                            required
                        >
                    </div>
                </div>
                <!-- Password Field -->
                <div class="space-y-2">
                    <div class="flex justify-between items-center">
                        <label for="password" class="text-sm font-semibold text-[#1a1a1a]">Password</label>
                        <a href="#" class="text-xs font-medium text-[#0044cc] hover:text-[#29abe2] transition-colors">
                            Forgot password?
                        </a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400">
                            <!-- Icon: Lock -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                        </div>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="Enter your password" 
                            class="block w-full pl-10 pr-3 py-3 border border-gray-200 rounded-xl text-[#1a1a1a] placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#0044cc] focus:border-transparent transition duration-200 ease-in-out bg-gray-50 hover:bg-white"
                            required
                        >
                    </div>
                </div>

                @error('access_id')
                <div class="flex justify-center">
                    <span class="text-sm text-red-600">{{ $message }}</span>
                </div>
                @enderror
                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-[#0044cc] hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#29abe2] transition-all duration-200 transform hover:-translate-y-0.5 shadow-lg hover:shadow-xl"
                >
                    Login
                </button>

            </form>

            <!-- Social Login -->
            <div class="relative mt-8">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-200"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-[#888888]">Or login with</span>
                </div>
            </div>
            
            <div class="mt-6 grid grid-cols-2 gap-3">
                <button type="button" class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-200 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                     <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12.545,10.239v3.821h5.445c-0.712,2.315-2.647,3.972-5.445,3.972c-3.332,0-6.033-2.701-6.033-6.032s2.701-6.032,6.033-6.032c1.498,0,2.866,0.549,3.921,1.453l2.814-2.814C17.503,2.988,15.139,2,12.545,2C7.021,2,2.543,6.477,2.543,12s4.478,10,10.002,10c8.396,0,10.249-7.85,9.426-11.748L12.545,10.239z"/>
                    </svg>
                    <span class="ml-2">Google</span>
                </button>
                <button type="button" class="w-full inline-flex justify-center py-2.5 px-4 border border-gray-200 rounded-lg shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 transition-colors">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                         <path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/>
                    </svg>
                    <span class="ml-2">Facebook</span>
                </button>
            </div>
        </div>
    </div>

</body>
</html>