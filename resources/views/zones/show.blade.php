<x-layout heading="{{ $zone->name }}">
    <x-content>
        <div>
            <div class="flow-root">
                <div>
                    <header class="mb-2 float-left">
                        <h3 class="font-bold text-gray-600">{{ $zone->name }}</h3>
                    </header>
                </div>
                <div>
                    <p class="text-xs text-gray-600 italic float-right">
                        Unique ID: {{ $zone->id }}
                    </p>
                </div>
            </div>

            <img class="py-3 px-2"
                 src="/images/zones.png"
                 alt="Zone plan overiew" width="400" height="16">

            <hr>

            @if($zone->doors->count())
                <h3 class="mt-4 text-sm font-semibold text-gray-5 hover:text-gray-900">Doors</h3>
              @else
                <h3 class="mt-4 text-sm font-semibold text-gray-5 hover:text-gray-900">No doors assigned to this zone</h3>
            @endif

            <div class="flex space-x-2 mt-4">
                <div class="grid grid-cols-5 gap-4 place-items-stretch">
                    @foreach ($zone->doors as $door)
                        <x-door-button :door="$door"/>
                    @endforeach
                </div>
            </div>
            <div class="">
                <p class="text-xs mt-6 text-gray-400">
                    <time>Created {{ $zone->created_at->diffForHumans() }}</time>
                </p>
            </div>
        </div>
    </x-content>
</x-layout>
