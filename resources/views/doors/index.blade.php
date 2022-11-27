<x-layout heading="Manage Doors">
    <x-content class="grow-none">
        <x-table.frame>
            <thead class="border-b">
            <tr>
                <x-table.header>Name</x-table.header>
                <x-table.header>Zone</x-table.header>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($doors as $door)
                <tr>
                    <x-table.cell>
                        <a href="{{ route('doors.show', ['door' => $door]) }}">
                            {{ $door->name }}
                        </a>
                    </x-table.cell>
                    <x-table.cell>
                        @if($door->zone)
                            <a href="{{ route('zones.show', ['zone' => $door->zone->id]) }}">
                                {{ $door->zone->name }}
                            </a>
                        @else
                            <a href="{{ route('zones.index') }}">
                                No zone
                            </a>
                        @endif
                    </x-table.cell>
                    <x-table.cell>
                        <a href="{{ route('doors.edit', ['door' => $door]) }}"
                           class="px-4 py-1 text-xs leading-5 font-semibold rounded shadow-sm
                                  text-gray-800 bg-gray-100 uppercase
                                  hover:bg-emerald-500 hover:text-white focus:ring hover:shadow-lg">
                            Edit
                        </a>
                    </x-table.cell>
                    <x-table.cell>
                        <form method="POST" action="{{ route('doors.destroy', ['door' => $door]) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="inline-flex px-3 text-xs leading-5 font-semibold uppercase
                                           text-gray-400 hover:text-amber-500 hover:font-extrabold">
                                Delete
                            </button>
                        </form>
                    </x-table.cell>
                </tr>
            @endforeach
            </tbody>
        </x-table.frame>
    </x-content>
</x-layout>
