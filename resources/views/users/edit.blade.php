<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary bg-opacity-50 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('user.edit', ['id' => $user->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="nombre"
                                class="text-md font-serif font-bold">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ $user->nombre }}" />
                            
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="apellidos"
                            class="text-md font-serif font-bold">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ $user->apellidos }}" />
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="direccion"
                            class="text-md font-serif font-bold">Dirección</label>
                            <input type="textarea" name="direccion" id="direccion"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ $user->direccion }}" />
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="email"
                            class="text-md font-serif font-bold">Email</label>
                            <input type="email" name="email" id="email"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ $user->email }}" />
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="password"
                            class="text-md font-serif font-bold">Contraseña</label>
                            <input type="text" name="password" id="password"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ $user->password }}" />
                        </div>
                        <button type="submit"
                            class=" bg-complement  hover:bg-complement_1 focus:ring-4 focus:outline-none font-serif font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2">Editar
                            usuario</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>