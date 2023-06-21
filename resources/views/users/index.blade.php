<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl leading-tight">
            {{ __('Carta de clientes') }}
        </h1>
    </x-slot>

    <div class="py-8 bg-secondary_1 bg-opacity-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('status'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <span class="font-medium">{{ session('status') }}</span>
                        </div>
                    @endif
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-md font-serif text-primary_2 uppercase bg-complement_3 bg-opacity-60 dark:bg-complement_4">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Apellidos
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Dirección
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        DNI
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Rol
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr class="bg-complement_1 bg-opacity-30 border dark:bg-complement_1">
                                        <th scope="row"
                                            class="px-6 py-4 text-md text-primary_4 whitespace-nowrap dark:text-complement">
                                            {{ $user->nombre }}
                                        </th>
                                        <td
                                            class="px-6 py-4 text-md text-primary_4 whitespace-nowrap dark:text-complement">
                                            {{ $user->apellidos }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-md text-primary_4 whitespace-nowrap dark:text-complement">
                                            {{ $user->direccion }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-md text-primary_4 whitespace-nowrap dark:text-complement">
                                            {{ $user->dni }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-md text-primary_4 whitespace-nowrap dark:text-complement">
                                            {{ $user->email }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-md text-primary_4 whitespace-nowrap dark:text-complement">
                                            {{ $user->rol }}
                                        </td>
                                        <td
                                            class="px-6 py-4 text-md text-primary_4 whitespace-nowrap dark:text-complement">

                                            <a href="{{ route('user.edit',  $user->id) }}">
                                                <button type="button"
                                                    class=" bg-primary  hover:bg-secondary focus:ring-4 focus:outline-none font-serif font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2">Editar</button>
                                            </a>
                                            <a href="{{route('user.destroy',  $user->id) }}}}">
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class=" bg-primary  hover:bg-secondary focus:ring-4 focus:outline-none font-serif font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2">Eliminar</button>
                                                </form>
                                                
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
