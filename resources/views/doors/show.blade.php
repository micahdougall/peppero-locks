<x-layout heading="{{ $door->name }}">
    <x-content>
        <div>
            <div class="flow-root">
                <div>
                    <header class="mb-2 float-left">
                        <h3 class="font-bold text-gray-600">{{ $door->name }}</h3>
                    </header>
                </div>
                <div>
                    <p class="text-xs text-gray-600 italic float-right">
                        Unique ID: {{ $door->id }}
                    </p>
                </div>
            </div>

            <img class="py-3 px-2"
                 src="/images/doors.jpg"
                 alt="Zone plan overiew" width="400" height="16">

            <hr>

            <div class="mt-4 text-sm font-semibold text-gray-5 hover:text-pink-500">
                <a href="/zones/{{ $door->zone ? $door->zone->id : '' }}">
                    {{ $door->zone ? $door->zone->name : 'No Zone' }}
                </a>
            </div>

            <div class="">
                <p class="text-xs mt-6 text-gray-400">
                    <time>Created {{ $door->created_at->diffForHumans() }}</time>
                </p>
            </div>
        </div>
    </x-content>
</x-layout>
