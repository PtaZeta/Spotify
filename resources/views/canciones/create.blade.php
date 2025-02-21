<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear canción
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('canciones.store') }}" class="max-w-sm mx-auto"
                  enctype="multipart/form-data">
                @csrf

                <!-- Título de la canción -->
                <div class="mb-5">
                    <x-input-label for="titulo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Título
                    </x-input-label>
                    <x-text-input name="titulo" type="text" id="titulo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('titulo')" />
                    <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                </div>

                <!-- Duración de la canción -->
                <div class="mb-5">
                    <x-input-label for="duracion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Duración (minutos:segundos)
                    </x-input-label>
                    <x-text-input name="duracion" type="text" id="duracion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('duracion')" />
                    <x-input-error :messages="$errors->get('duracion')" class="mt-2" />
                </div>

                <!-- Selección de artistas con checkboxes -->
                <div class="mb-5">
                    <x-input-label for="artistas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Selecciona Artistas
                    </x-input-label>
                    <div class="border border-gray-300 rounded-lg p-2 bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
                         style="max-height: 200px; overflow-y: auto;">
                        @foreach ($artistas as $artista)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="artistas[]" value="{{ $artista->id }}"
                                    {{ in_array($artista->id, old('artistas', [])) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-500">
                                <span class="text-gray-900 dark:text-white">{{ $artista->nombre }}</span>
                            </label>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('artistas')" class="mt-2" />
                </div>

                <div class="mb-5">
                    <x-input-label for="canciones" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Selecciona Albumes
                    </x-input-label>
                    <div class="border border-gray-300 rounded-lg p-2 bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
                         style="max-height: 200px; overflow-y: auto;">
                        @foreach ($albumes as $album)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="albumes[]" value="{{ $album->id }}"
                                    {{ in_array($album->id, old('albumes', [])) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-500">
                                <span class="text-gray-900 dark:text-white">{{ $album->nombre }}</span>
                            </label>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('albumes')" class="mt-2" />
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Crear
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
