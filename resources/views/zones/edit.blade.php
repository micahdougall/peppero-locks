<x-layout :heading="'Edit ' . $zone->name">
    <x-content>
        <form method="POST" action="/zones/{{ $zone->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $zone->name)"/>

            <x-form.button>Update</x-form.button>
        </form>
    </x-content>
</x-layout>
