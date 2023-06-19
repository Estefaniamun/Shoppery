<x-app-layout>
    <x-slot name="header">

    </x-slot>


    <div class="py-12 px-8">

        <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
            @foreach ($categorias as $categoria)
                <div class="text-lg">
                    <a href="">
                        <img class="h-auto max-w-full rounded-lg"
                            src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                    </a>
                </div>
            @endforeach


        </div>

</x-app-layout>
