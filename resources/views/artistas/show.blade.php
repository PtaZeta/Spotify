<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver Artista
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex items-center justify-center">
                <img src="{{ $artista->foto }}" alt="{{ $artista->nombre }}" class="rounded-lg shadow-lg max-w-full h-auto">
            </div>
            <div class="mt-6 text-center">
                <h3 class="text-2xl font-semibold text-gray-900">{{ $artista->nombre }}</h3>
                <div class="mt-2 text-gray-600">
                    <h4 class="text-lg font-semibold">Edad:</h4>
                    <p>{{ $artista->edad }} años</p>
                </div>
                <div class="mt-2 text-gray-600">
                    <h4 class="text-lg font-semibold">Nacionalidad:</h4>
                    <p>{{ $artista->nacionalidad }}</p>
                </div>
            </div>
            <ul>
                @foreach ($artista->canciones as $cancion)
                    <li class="mt-4">
                        <div class="text-gray-800 font-semibold">{{ $cancion->titulo }}</div>
                        <div class="text-gray-600">Duración: {{ $cancion->duracion }}</div>
                        <div class="text-gray-600">Artistas:
                            @foreach ($cancion->artistas as $artista)
                                <span>{{ $artista->nombre }}</span>{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="mt-6 text-center">
                <a href="{{ route('artistas.index') }}" class="text-indigo-600 hover:text-indigo-900">Volver a la lista de artistas</a>
            </div>
        </div>
    </div>
</x-app-layout>
