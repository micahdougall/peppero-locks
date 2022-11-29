@props(['zones'])
<x-layout heading="Create New Door">
    <x-content class="w-96">
        <form method="POST" action="/doors" enctype="multipart/form-data">
            @csrf

            <x-form.input name="name"/>

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
                    <option selected disabled>Select zone</option>
                    @foreach($zones as $zone)
                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                    @endforeach
                    <option value="{{ null }}">No zone</option>
                </select>

                <x-form.error name="zone_id"/>
            </x-form.field>

            <x-form.button :back="'doors.index'">Add</x-form.button>
    </form>
    </x-content>
</x-layout>

