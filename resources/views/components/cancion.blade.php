<div class="bg-white shadow-lg rounded-lg overflow-hidden w-full mx-auto text-center p-4">
    <div class="mt-1">
        <h2 class="text-lg font-semibold text-gray-700">{{ $cancion->titulo }}</h2>
        <p class="text-sm text-gray-500 mt-1"><b>Duración:</b> {{ $cancion->duracion }}</p>
        <p class="text-sm text-gray-500"><b>Artistas:</b>
            @foreach($cancion->artistas as $artista)
                <a href="{{ route('artistas.show', $artista) }}" class="text-blue-500 hover:underline">{{ $artista->nombre }}</a>{{ !$loop->last ? ',' : '' }}
            @endforeach
        </p>
    </div>
    <div class="flex justify-center space-x-4 mt-4">
        <a href="{{ route('canciones.show', $cancion) }}" class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-300">
            Ver
        </a>
        @can('update', $cancion)
            <a href="{{ route('canciones.edit', $cancion) }}"
               class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">
                Editar
            </a>
        @endcan

        @can('delete', $cancion)
            <form method="POST" action="{{ route('canciones.destroy', $cancion) }}">
                @csrf
                @method("DELETE")
                <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-300">
                    Borrar
                </button>

            </form>
        @endcan
    </div>
    @if ($errors->has('cancion_' . $cancion->id))
        <div class="mt-2 text-red-600">
            <p>{{ $errors->first('cancion_' . $cancion->id) }}</p>
        </div>
    @endif


</div>
