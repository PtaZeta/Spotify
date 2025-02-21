@props(['artista'])

<div class="bg-white shadow-lg rounded-lg overflow-hidden w-64 h-96 mx-auto text-center p-6">
    <a href="{{ route('artistas.show', $artista) }}">
        <img src="{{ $artista->foto }}"
             alt="{{ $artista->nombre }}"
             class="w-48 h-48 mx-auto rounded-full object-cover border-4 border-gray-300">
    </a>

    <div class="mt-4">
        <h2 class="text-lg font-semibold text-gray-700">{{ $artista->nombre }}</h2>
        <p class="text-sm text-gray-500 mt-1"><b>Edad:</b> {{ $artista->edad }}</p>
        <p class="text-sm text-gray-500"><b>Nacionalidad:</b> {{ $artista->nacionalidad }}</p>
    </div>

    <div class="flex justify-center space-x-4 mt-4">
        @can('update', $artista)
            <a href="{{ route('artistas.edit', $artista) }}"
               class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">
                Editar
            </a>
        @endcan

        @can('delete', $artista)
            <form method="POST" action="{{ route('artistas.destroy', $artista) }}">
                @csrf
                @method("DELETE")
                <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-2 focus:ring-red-300">
                    Borrar
                </button>
            </form>
        @endcan
    </div>
    @if ($errors->has('artista_' . $artista->id))
        <div class="mt-2 text-red-600">
            <p>{{ $errors->first('artista_' . $artista->id) }}</p>
        </div>
    @endif
</div>
