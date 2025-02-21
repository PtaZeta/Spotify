<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver Canción
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="mt-1 text-center">
                <h3 class="text-2xl font-semibold text-gray-900">{{ $cancion->titulo }}</h3>
                <div class="mt-2 text-gray-600">
                    <h4 class="text-lg font-semibold">Duración:</h4>
                    <p>{{ $cancion->duracion }} minutos</p>
                </div>
            </div>
            <div class="mt-6 text-center">
                <h3 class="text-2xl font-semibold text-gray-900">Artistas</h3>
                <ul class="mt-2 text-gray-600">
                    @foreach($cancion->artistas as $artista)
                    <a href="{{ route('artistas.show', $artista) }}" class="text-blue-500 hover:underline">{{ $artista->nombre }}</a>{{ !$loop->last ? ',' : '' }}
                    @endforeach
                </ul>
            </div>
            <div class="mt-6 text-center">
                <h3 class="text-2xl font-semibold text-gray-900">Albumes</h3>
                <ul class="mt-2 text-gray-600">
                    @foreach($cancion->albumes as $album)
                    <a href="{{ route('albumes.show', $album) }}" class="text-blue-500 hover:underline">{{ $album->nombre }}</a>{{ !$loop->last ? ',' : '' }}
                    @endforeach
                </ul>
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('canciones.index') }}" class="text-indigo-600 hover:text-indigo-900">Volver a la lista de canciones</a>
            </div>
        </div>
    </div>
</x-app-layout>
