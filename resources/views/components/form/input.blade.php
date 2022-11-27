@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input class="bg-gray-50 border border-gray-300
                  text-gray-900 text-sm rounded-lg
                  block w-full p-2.5"
           name="{{ $name }}"
           id="{{ $name }}"
           required
           {{ $attributes(['value' => old($name)])}}
    >
    <x-form.error name="{{ $name }}"/>
</x-form.field>
