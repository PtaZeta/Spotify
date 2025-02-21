@props(['album'])
<div class="bg-white shadow-lg rounded-lg overflow-hidden">
    <a href="{{ route('albumes.show', $album)}}">
        <img src="{{ $album->imagen }}" alt="{{ $album->nombre }}" class="w-full h-48 object-cover">
        <div class="p-4">
            <p class="text-gray-600 text-sm">{{ $album->nombre }}</p>
            <p class="mt-2 text-sm text-gray-500"><b>Usuarios:</b></p>
            <ul class="list-disc list-inside">
                @foreach ($album->users as $user)
                    <li>{{ $user->name }}</li>
                @endforeach
            </ul>
            <p class="mt-2 text-sm text-gray-500"><b>Canciones:</b></p>
            <ul class="list-disc list-inside">
                @foreach ($album->canciones as $cancion)
                    <li>{{ $cancion->titulo }}</li>
                @endforeach
            </ul>
            <div class="flex space-x-2 mt-4">
                @can('update', $album)
                    <a href="{{ route('albumes.edit', $album) }}">
                        <button type="button" class="px-2 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</button>
                    </a>
                @endcan
                @can('delete', $album)
                    <form class="inline" method="POST" action="{{ route('albumes.destroy', $album) }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="px-2 py-1 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Borrar</button>
                    </form>
                @endcan
            </div>
            @if ($errors->has('album_' . $album->id))
                <div class="mt-2 text-red-600">
                    <p>{{ $errors->first('album_' . $album->id) }}</p>
                </div>
            @endif
        </div>
    </a>

</div>
