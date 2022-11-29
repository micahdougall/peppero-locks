@props(['zone', 'active' => true])

@php
    $classes = 'flex px-2.5 py-1 space-x-1 space-y-1
                border-y rounded-full
                border-gray-300 shadow-sm shadow-gray-500/50 text-gray-400
                text-xs uppercase font-semibold whitespace-nowrap text-center
                hover:border-pink-700 hover:text-pink-700 hover:bg-pink-200';
@endphp

<div x-data="{
      selected: {{ $active ? 'true' : 'false' }},
      toggle() { this.selected = ! this.selected }
    }"
    {{ $attributes(['class' => $classes]) }}
    :class="selected && 'border-pink-500 shadow-sm shadow-pink-500/50 text-pink-600 bg-pink-100'"
>
    <div @click="toggle()">
        <a href="#"
           style="font-size: 10px">{{ $zone->name }}
        </a>
    </div>

    <input type="hidden"
           name="{{ $zone->name }}"
           x-model="selected"
    />
</div>

