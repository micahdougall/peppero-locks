@props(['header'])

<div x-data="{ show: false }" @click.away="show = false">
    <button @click="show = ! show"
            class="text-md font-semibold text-gray-500 hover:text-pink-500"
    >
        {{ $header }}
    </button>

    <div class="absolute py-2 bg-gray-100 rounded-xl mt-1 w-36 space-y-0"
         x-show="show"
         x-transition:enter="transition duration-250 transform"
         x-transition:enter-start="scale-80 opacity-50"
         x-transition:leave="transition duration-200 transform"
         x-transition:leave-end="scale-90 opacity-0"
    >
        {{ $slot }}
    </div>
</div>
