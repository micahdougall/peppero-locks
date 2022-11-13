@props(['active' => true, 'nationality'])

@php
    $classes = 'flex px-3 py-1 border rounded-full text-xs uppercase font-semibold space-x-1 space-y-1
    border-gray-300 text-gray-300
    hover:border-green-700 hover:text-green-700 hover:bg-green-50';
@endphp

<input type="button" onClick="message"


{{--       class="border border-gray-200 p-2 w-full rounded"--}}
{{--       name="{{ $nationality }}"--}}
{{--       id="{{ $nationality }}"--}}
>
<div x-data="{ selected: false }"
     @click="selected = ! selected"
     {{ $attributes(['class' => $classes]) }}
     :class="selected && 'border-green-600 text-green-600'"
>
    <div>
        <a href="#"
           style="font-size: 10px">{{ $nationality->name }}
        </a>
    </div>
    <div>
        <img class="rounded-sm fill-blue opacity-25" :class="selected && 'opacity-100'"
             src="/images/{{ $nationality->name }}.svg"
             alt="nationality flag"
             style="width: 10px"
            />
    </div>
</div>
{{--</input>--}}
