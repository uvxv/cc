<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? config('app.name', 'Page Title') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center py-6 px-4 sm:px-6 lg:px-8 font-sans text-slate-800 text-sm">
    <div class="w-full max-w-4xl mx-auto p-4 sm:p-6 bg-white rounded-lg shadow">
        {{ $slot }}
    </div>

    @livewireScripts
</body>
</html>
