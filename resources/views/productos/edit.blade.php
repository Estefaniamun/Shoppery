<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('producto.edit', ['id' => $producto->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="nombre" class="text-lg">Nombre</label>
                            <input type="text" name="nombre" id="nombre"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder="" value="{{$producto->nombre}}" required />
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="descripcion" class="text-lg">Descripcion</label>
                            <textarea id="descripcion" rows="4" value="{{$producto->descripcion}}"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{$producto->descripcion}}</textarea>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="foto" class="text-lg">Foto</label>
                            <input
                                class="block w-full text-md  border rounded-lg cursor-pointer  focus:outline-none"
                                 id="foto" type="file" value="{{$producto->foto}}">

                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="categoria"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una
                                categoría</label>
                            <select id="categoria" size="5"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" selected="$producto->categoria">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-10 group">
                            <label for="talla"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selecciona una
                                talla</label>
                            <select id="talla" size="5" selected="{{$producto->talla}}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="XXL">XXL</option>
                            </select>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-14 mb-6 mt-6group">
                                <label for="precio" class="text-lg">Precio</label>
                                <input type="number" name="precio" id="precio" step="0.01"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="10.00€" required />
                            </div>
                        </div>
                        <button type="submit"
                            class="text-white bg-complement  hover:bg-complement_2 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2">Editar producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>