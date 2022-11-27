<x-layout heading="Dashboard">
    <x-content>
        @if($zones->count())
            <x-table.frame>
                <thead class="border-b">
                <tr>
                    <x-table.header>Zone</x-table.header>
                    <x-table.header>Doors</x-table.header>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($zones as $zone)
                    <tr>
                        <x-table.cell>
                            <a href="{{ route('zones.show', ['zone' => $zone]) }}">
                                {{ $zone->name }}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            @if($zone->doors->count())
                                <div class="grid grid-cols-5 gap-2 place-items-stretch">
                                    @foreach ($zone->doors as $door)
                                        <x-door-button :door="$door"/>
                                    @endforeach
                                </div>
                            @else
                                <p class="ext-xs leading-5 font-semibold text-gray-400">
                                    No doors accessible in zone
                                </p>
                            @endif
                        </x-table.cell>
                    </tr>
                @endforeach
                <tr>
                    <x-table.cell>
                        <p>Direct access</p>
                    </x-table.cell>
                    <x-table.cell>
                        @if($doors->count())
                            <div class="grid grid-cols-5 gap-2 place-items-stretch">
                                @foreach($doors as $door)
                                    <x-door-button :door="$door"/>
                                @endforeach
                            </div>
                        @else
                            <p class="ext-xs leading-5 font-semibold text-gray-400">
                                No direct access doors assigned
                            </p>
                        @endif
                    </x-table.cell>
                </tr>
                </tbody>
            </x-table.frame>
        @else
            <p class="ext-xs leading-5 font-semibold text-gray-400">
                No zones or doors have been assigned to you
            </p>
        @endif

    </x-content>
</x-layout>
