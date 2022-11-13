@props(['zones'])
<x-layout>
{{--    <x-setting heading="Create New Door">--}}
    <x-setting heading="Create New Door" class="w-80">
        <form method="POST" action="/doors" enctype="multipart/form-data">
            @csrf

            <x-form.input name="name"/>

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
                    <option selected disabled>Select zone</option>
                    @foreach($zones as $zone)
                        <option value="{{ $zone->name }}">{{ $zone->name }}</option>
                    @endforeach
                </select>

                <x-form.error name="zone_id"/>
            </x-form.field>

            <x-form.button>Add</x-form.button>
        </form>
    </x-setting>
</x-layout>

