<x-layout>
    <x-setting :heading="'Edit ' . $zone->name" class="max-w-3xl">
        <form method="POST" action="/zones/{{ $zone->id }}" enctype="multipart/form-data"
{{--            x-data="{--}}
{{--                nationalities: {{ $nationalities }},--}}

{{--                oldNationalities: {{ $zone->nationalities }},--}}

{{--                name: 'test'--}}
{{--            }"--}}
{{--              x-modelable="name"--}}
        >
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $zone->name)"/>

{{--            <x-form.field>--}}
{{--                <x-form.label name="Nationalities"/>--}}
{{--                <div class="flex space-x-2">--}}
{{--                    @foreach($nationalities as $nationality)--}}
{{--                        <x-form.nationality-select :nationality="$nationality"/>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </x-form.field>--}}

            <x-form.error name="name"/>

            <x-form.button>Update</x-form.button>
        </form>

    </x-setting>
</x-layout>
