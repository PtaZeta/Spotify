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
                {{ __('Inicio') }}
            </h2>
        </x-slot>

        <div class="container mx-auto mt-5">
            <form action="{{ route('index') }}" method="GET">
                <input type="text" name="buscar" placeholder="Buscar álbumes, canciones o artistas" class="p-2 border rounded">
                <button type="submit" class="p-2 bg-blue-500 text-white rounded">Buscar</button>
            </form>

            @if(request()->has('buscar') && request('buscar') != '')
                <div class="mt-4">
                    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Resultados de búsqueda para: {{ request('buscar') }}</h3>

                    <h4 class="mt-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Álbumes:</h4>
                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                        @foreach($albumes as $album)
                            <x-album :album="$album" />
                        @endforeach
                    </div>

                    <h4 class=" mt-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Canciones:</h4>
                    <div class="flex flex-col space-y-4 mt-4">
                        @foreach($canciones as $cancion)
                            <x-cancion :cancion="$cancion" />
                        @endforeach
                    </div>

                    <h4 class=" mt-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Artistas:</h4>
                    <div class="grid grid-cols-5 gap-6 mt-4">
                        @foreach($artistas as $artista)
                            <x-artista :artista="$artista" />
                        @endforeach
                    </div>
                </div>
            @else
                <div class="mt-4">
                    <h4 class="mt-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Álbumes:</h4>
                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
                        @foreach($albumes as $album)
                            <x-album :album="$album" />
                        @endforeach
                    </div>

                    <h4 class=" mt-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Canciones:</h4>
                    <div class="flex flex-col space-y-4 mt-4">
                        @foreach($canciones as $cancion)
                            <x-cancion :cancion="$cancion" />
                        @endforeach
                    </div>

                    <h4 class=" mt-4 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Artistas:</h4>
                    <div class="grid grid-cols-5 gap-6 mt-4">
                        @foreach($artistas as $artista)
                            <x-artista :artista="$artista" />
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </x-app-layout>
</body>
</html>
