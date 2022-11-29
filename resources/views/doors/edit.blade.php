@props(['zones'])
<x-layout heading="Edit {{ $door->name }}">
    <x-content>
        <form method="POST" action="/doors/{{ $door->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $door->name)"/>

            <x-form.field>
                <label class="block mb-2 font-bold text-xs text-gray-700"
                       for="zone_id"
                >Zone Name
                </label>

                <select class="form-select-sm appearance-none
                           bg-gray-50 border border-gray-300
                           text-gray-900 text-sm rounded-lg
                           transition ease-in-out
                           block w-full px-4 py-2.5"
                        name="zone_id"
                        id="zone_id"
                >
                    @foreach($zones as $zone)
                        <option
                            value="{{ $zone->id }}"
                            {{ $zone->id === $door->zone->id ? 'selected' : '' }}
                        >{{ $zone->name }}</option>
                    @endforeach
                    <option :value="null">No zone</option>
                </select>

                <x-form.error name="zone_id"/>
            </x-form.field>

            <x-form.button :back="'doors.index'">Update</x-form.button>
        </form>
    </x-content>
</x-layout>
