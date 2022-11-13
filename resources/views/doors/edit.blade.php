@props(['zones'])
<x-layout>
    <x-setting :heading="'Edit '.  $door->name" class="max-w-3xl">
        <form method="POST" action="/doors/{{ $door->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $door->name)"/>

            <x-form.field>
                <x-form.label name="zone_id"/>

                <select class="form-select-sm appearance-none
                        block w-full px-3 py-2
                        text-gray-600
                        bg-white bg-clip-padding bg-no-repeat
                        border-gray-200 rounded
                        transition ease-in-out
                        m-0"
                        name="zone_id"
                        id="zone_id"
                        required
                >
                    @foreach($zones as $zone)
                        <option
                            value="{{ $zone->id }}"
                            {{ $zone->id === $door->zone->id ? 'selected' : '' }}
                        >{{ $zone->name }}</option>
                    @endforeach
                </select>

                <x-form.error name="zone_id"/>
            </x-form.field>

            <x-form.error name="name"/>

            <x-form.button>Update</x-form.button>
        </form>

    </x-setting>
</x-layout>
