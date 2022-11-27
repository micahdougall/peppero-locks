@props(['zones'])

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
                        <div class="grid grid-cols-5 gap-2 place-items-stretch">
                            @foreach ($zone->doors as $door)
                                <x-door-button :door="$door"/>
                            @endforeach
                        </div>
                    </x-table.cell>
                    @admin
                    <x-table.cell>
                        <a href="{{ route('zones.edit', ['zone' => $zone]) }}"
                           class="px-4 py-1 text-xs leading-5 font-semibold rounded shadow-sm
                                  text-gray-800 bg-gray-100 uppercase
                                  hover:bg-emerald-500 hover:text-white focus:ring hover:shadow-lg">
                            Edit
                        </a>
                    </x-table.cell>
                    <x-table.cell>
                        <form method="POST" action="{{ route('zones.destroy', ['zone' => $zone]) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="inline-flex px-3 text-xs leading-5 font-semibold uppercase
                                           text-gray-400 hover:text-amber-500 hover:font-extrabold">
                                Delete
                            </button>
                        </form>
                    </x-table.cell>
                    @endadmin
                </tr>
            @endforeach
            </tbody>
        </x-table.frame>
    @else
        <p class="ext-xs leading-5 font-semibold text-gray-400">
            No zones have been assigned to you
        </p>
    @endif

</x-content>
