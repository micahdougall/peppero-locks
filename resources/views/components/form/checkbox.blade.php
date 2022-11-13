@props(['nationalities'])
<x-form.field>
{{--    <x-form.label name="{{ $name }}"/>--}}

{{--    <input type="checkbox" class="border border-gray-200 p-2 w-full rounded"--}}
{{--           name="{{ $name }}"--}}
{{--           id="{{ $name}}"--}}
{{--   >--}}

    @foreach($nationalities->name as $n)

{{--        <x-nationality-button name="{{ $n }}"/>--}}

    @endforeach


{{--    <x-form.error name="{{ $name }}"/>--}}
</x-form.field>


