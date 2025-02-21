<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@1.5.0/dist/flowbite.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Álbumes') }}
            </h2>
        </x-slot>
        <div class="container mx-auto p-6">
            <div class="flex justify-end mb-4">
                <a href="{{ route('artistas.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Crear artista</a>
            </div>

            <div class="grid grid-cols-5 gap-6">
                @foreach($artistas as $artista)
                    <x-artista :artista="$artista" />
                @endforeach
            </div>

            <div class="mt-2">
                {{ $artistas->links() }}
            </div>
        </div>
    </x-app-layout>
</body>
</html>
