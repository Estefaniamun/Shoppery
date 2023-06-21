<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Productos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('status'))
                <div class="p-4 mb-4 text-sm  rounded-lg bg-secondary" role="alert">
                    <span class="font-medium">{{ session('status') }}</span>
                  </div>
                    
                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100 grid grid-cols-2 md:grid-cols-2 gap-2">
                   
                    @foreach ($productos as $producto)
                        <div
                            class=" bg-secondary bg-opacity-40 block border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                            <div class="m-3">
                                <img class="rounded-t-lg" src="storage/img_productos/{{ $producto->foto }}" width="200px" height="200px" alt="foto" />
                            </div>
                            <div class="p-5 m-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $producto->nombre }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ $producto->descripcion }}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Precio: {{ $producto->precio }}</p>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Talla: {{ $producto->talla }}</p>
                                    @foreach ($descuentos as $descuento)
                                        @if ($producto->categoria == $descuento->categoria)
                                           <p class="mb-3 font-normal text-complement_4"> Descuento: {{$descuento->porcentaje}}% - {{$descuento->descripcion}}</p>
                                        @endif
                                    @endforeach
                                <a href="{{route('compras.index', $producto->id)}}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <button type="button"
                                        class="text-white bg-complement   hover:bg-complement_2 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2">Comprar
                                     
                                    </button>
                                </a>
                                @auth
                                    
                                
                                @if ($user->rol == 'admin')
                                    <a href="{{ route('producto.edit',$producto->id) }}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <button type="button"
                                            class="text-white bg-complement   hover:bg-complement_2 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2">Editar
                                            producto
                                        </button>
                                    </a>
                                    <a href="{{route('producto.destroy',$producto->id)}}"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        
                                        <form action="{{ route('producto.destroy', $producto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white bg-complement   hover:bg-complement_2 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2">Eliminar</button>
                                        </form>
                                    </a>
                                @endif
                                @endauth
                            </div>
                        </div>
                    @endforeach

</x-app-layout>
