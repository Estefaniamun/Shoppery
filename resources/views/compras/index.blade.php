<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Realizando compra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-secondary dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if ($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <form action="{{ route('compra.store', $producto->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="pago" class="text-lg">Método de pago</label>
                            <input type="text" name="pago" id="pago"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />

                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="fecha" class="text-lg">Fecha</label>
                            <input type="date" name="fecha" id="fecha"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required />
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="user" class="text-lg">Usuario</label>
                            <input type="text" name="user" id="user"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " required value="{{ Auth::user()->email }}" disabled readonly />

                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">

                                <label for="descuento"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                    option</label>
                                <select id="descuento" name="descuento"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($descuentos as $descuento)
                                        @if ($producto->categoria == $descuento->categoria)
                                            <option value="{{ $descuento->id }}"selected>{{ $descuento->porcentaje }} -
                                                {{ $descuento->descripcion }}</option>
                                        @endif
                                    @endforeach

                                </select>

                            </div>
                            <div class="relative z-0  mb-6 group">
                                <label for="cantidad" class="text-lg">Cantidad</label>
                                <input type="number" name="cantidad" id="cantidad"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="10 " required />

                            </div>
                        </div>

                </div>
                <button type="submit"
                    class="text-white bg-complement  hover:bg-complement_2 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2">Comprar</button>
                </form>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
