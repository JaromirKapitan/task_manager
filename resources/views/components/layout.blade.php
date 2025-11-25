<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Default Title' }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 text-gray-800">
    <div class="flex h-screen">
        <x-sidebar />
        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>
</html>
