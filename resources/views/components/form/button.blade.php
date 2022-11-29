@props(['back' => 'null'])

<x-form.field>
    <div class="flex space-x-20 justify-center">
        @if($back != 'null')
            <a href="{{ route($back) }}"
               class="px-6 py-2 rounded shadow-md
                  text-gray-600 font-bold text-xs
                  hover:bg-gray-400 hover:text-white focus:outline-none focus:ring hover:shadow-lg">
                Cancel
            </a>
        @endif

        <button
            type="submit"
            class="px-6 py-2 text-xs rounded shadow-md
                   text-white font-semibold uppercase
                   bg-amber-400 hover:bg-amber-500 focus:outline-none focus:ring hover:shadow-lg"
        >
            {{ $slot }}
        </button>
    </div>
</x-form.field>

