<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar artista
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('artistas.update', $artista) }}" class="max-w-sm mx-auto"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nombre del artista -->
                <div class="mb-5">
                    <x-input-label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nombre
                    </x-input-label>
                    <x-text-input name="nombre" type="text" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('nombre', $artista->nombre)" />
                    <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                </div>

                <!-- Edad del artista -->
                <div class="mb-5">
                    <x-input-label for="edad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Edad
                    </x-input-label>
                    <x-text-input name="edad" type="number" id="edad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('edad', $artista->edad)" />
                    <x-input-error :messages="$errors->get('edad')" class="mt-2" />
                </div>

                <!-- Nacionalidad del artista -->
                <div class="mb-5">
                    <x-input-label for="nacionalidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Nacionalidad
                    </x-input-label>
                    <x-text-input name="nacionalidad" type="text" id="nacionalidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        :value="old('nacionalidad', $artista->nacionalidad)" />
                    <x-input-error :messages="$errors->get('nacionalidad')" class="mt-2" />
                </div>

                <!-- Imagen -->
                <div class="mb-5">
                    <x-input-label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Foto
                    </x-input-label>
                    <div class="flex items-center justify-center mb-4">
                        <img src="{{ $artista->foto }}" alt="{{ $artista->nombre }}" class="rounded-lg shadow-lg max-w-60 h-auto">
                    </div>
                    </div>
                    <x-text-input name="foto" type="file" id="foto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    <x-input-error :messages="$errors->get('foto')" class="mt-2" />
                </div>

                <!-- Botón de envío -->
                <div class=" mt-2 flex justify-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
