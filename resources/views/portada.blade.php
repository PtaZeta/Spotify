<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify</title>
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
                <a href="{{ route('albumes.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Crear album</a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                @foreach($albumes as $album)
                    <x-album :album="$album" />
                @endforeach
            </div>

            <div class="mt-2">
                {{ $albumes->links() }}
            </div>
        </div>
    </x-app-layout>
</body>
</html>
