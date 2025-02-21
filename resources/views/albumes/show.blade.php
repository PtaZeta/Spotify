<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ver imagen
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="flex items-center justify-center">
                <img src="{{ $album->imagen }}" alt="{{ $album->nombre }}" class="rounded-lg shadow-lg max-w-full h-auto">
            </div>
            <div class="mt-6 text-center">
                <h3 class="text-2xl font-semibold text-gray-900">{{ $album->nombre }}</h3>
                <div class="mt-2 text-gray-600">
                    <h4 class="text-lg font-semibold">Usuarios:</h4>
                    <ul>
                        @foreach ($album->users as $user)
                            <li>{{ $user->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Duración total -->
            <div class="mt-6 text-center">
                <h4 class="text-lg font-semibold text-gray-900">Duración total del álbum:</h4>
                <p class="text-xl text-gray-800">{{ $duracionTotalFormateada }}</p>
            </div>
            <div class="mt-6">
                <h4 class="text-lg font-semibold text-gray-900">Ordenar canciones:</h4>
                <form method="GET" action="{{ route('albumes.show', $album->id) }}">
                    <select name="orden" class="border border-gray-300 rounded p-2">
                        <option value="titulo" {{ $ordenCampo == 'titulo' ? 'selected' : '' }}>Nombre</option>
                        <option value="duracion" {{ $ordenCampo == 'duracion' ? 'selected' : '' }}>Duración</option>
                    </select>
                    <select name="tipo" class="border border-gray-300 rounded p-2">
                        <option value="asc" {{ $ordenTipo == 'asc' ? 'selected' : '' }}>Ascendente</option>
                        <option value="desc" {{ $ordenTipo == 'desc' ? 'selected' : '' }}>Descendente</option>
                    </select>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Ordenar</button>
                </form>

            </div>

            <!-- Sección de canciones -->
            <div class="mt-6">
                <h4 class="text-lg font-semibold text-gray-900">Canciones:</h4>
                <ul>
                    @foreach ($canciones as $cancion)
                        <li class="mt-4">
                            <div class="text-gray-800 font-semibold">{{ $cancion->titulo }}</div>
                            <div class="text-gray-600">Duración: {{ $cancion->duracion }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-4">
                {{ $canciones->appends(['orden' => $ordenCampo, 'tipo' => $ordenTipo])->links() }}
            </div>
            <div class="mt-6">
                <h4 class="text-lg font-semibold text-gray-900">Artistas:</h4>
                <div class="text-gray-600">
                    @foreach ($artistasUnicos as $artista)
                        <span>{{ $artista->nombre }}</span>{{ !$loop->last ? ', ' : '' }}
                    @endforeach
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('albumes.index') }}" class="text-indigo-600 hover:text-indigo-900">Volver a la lista de álbumes</a>
            </div>
        </div>
    </div>
</x-app-layout>
