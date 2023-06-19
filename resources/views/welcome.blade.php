<x-app-layout>
    <x-slot name="header">

    </x-slot>


    <div class="py-12 px-8">
       
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($categorias as $categoria)
            <div class="grid gap-4">
                <div>
                    @foreach ($productos as $producto)
                    <img class="h-auto max-w-full rounded-lg"
                    src="{{$producto->foto}}" alt="">
                    @endforeach
                    
                </div>

            @endforeach
        </div>
        
    </div>
</x-app-layout>
