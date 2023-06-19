<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-complement   hover:bg-complement_2 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-800 font-medium rounded-lg text-md px-5 py-2.5 text-center mr-2 mb-2']) }}>
    {{ $slot }}
</button>
