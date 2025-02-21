<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear álbum
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('albumes.store') }}" class="max-w-sm mx-auto"
                  enctype="multipart/form-data">
                @csrf

                <!-- Nombre del álbum -->
                <div class="mb-5">
                    <x-input-label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nombre
                    </x-input-label>
                    <x-text-input name="nombre" type="text" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('nombre')" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <div class="mb-5">
                    <x-input-label for="usuarios" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Selecciona Usuarios
                    </x-input-label>
                    <div class="border border-gray-300 rounded-lg p-2 bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
                         style="max-height: 200px; overflow-y: auto;">
                        @foreach ($usuarios as $usuario)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="usuarios[]" value="{{ $usuario->id }}"
                                    {{ in_array($usuario->id, old('usuarios', [])) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-500">
                                <span class="text-gray-900 dark:text-white">{{ $usuario->name }}</span>
                            </label>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('usuarios')" class="mt-2" />
                </div>

                <div class="mb-5">
                    <x-input-label for="canciones" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Selecciona Canciones
                    </x-input-label>
                    <div class="border border-gray-300 rounded-lg p-2 bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
                         style="max-height: 200px; overflow-y: auto;">
                        @foreach ($canciones as $cancion)
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" name="canciones[]" value="{{ $cancion->id }}"
                                    {{ in_array($cancion->id, old('canciones', [])) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-500">
                                <span class="text-gray-900 dark:text-white">{{ $cancion->titulo }}</span>
                            </label>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->get('canciones')" class="mt-2" />
                </div>

                <div class="mb-5">
                    <x-input-label for="imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Imagen
                    </x-input-label>
                    <x-text-input name="imagen" type="file" id="imagen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('imagen')" />
                    <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
                </div>

                <!-- Botón de envío -->
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Crear
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
