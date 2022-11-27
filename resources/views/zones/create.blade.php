<x-layout heading="Create New Zone">
    <x-section>
{{--    <x-navigation heading="Create New Zone" class="max-w-3xl">--}}
        <form method="POST" action="/zones" enctype="multipart/form-data"
{{--            x-data="{--}}
{{--                nationalities: {{ $nationalities }}--}}
{{--            }"--}}
        >
            @csrf

            <x-form.input name="name"/>

{{--            <x-form.field>--}}
{{--                <x-form.label name="Nationalities"/>--}}
{{--                <div class="flex space-x-2">--}}
{{--                    @foreach($nationalities as $nationality)--}}
{{--                        <x-form.nationality-select :nationality="$nationality"/>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </x-form.field>--}}

            <x-form.button>Add</x-form.button>
        </form>
{{--    </x-navigation>--}}
    </x-section>
</x-layout>

