@props(['name'])
<label class="block mb-2 font-bold text-xs text-gray-700"
       for="{{ $name }}"
>{{ ucfirst(str_replace('_', ' ', $name)) }}
</label>
