@props(['door', 'active' => true])

@php
    $classes = 'flex px-2.5 py-1 space-x-1 space-y-1
                border-y rounded-full
                border-gray-300 shadow-sm shadow-gray-500/50 text-gray-400
                text-xs uppercase font-semibold whitespace-nowrap text-center
                hover:border-cyan-700 hover:text-cyan-700 hover:bg-cyan-200';
@endphp

<div x-data="{
      selected: {{ $active ? 'true' : 'false' }},
      toggle() { this.selected = ! this.selected }
    }"
    {{ $attributes(['class' => $classes]) }}
    :class="selected && 'border-cyan-500 shadow-sm shadow-cyan-500/50 text-cyan-600 bg-cyan-100'"
>
    <div @click="toggle()">
        <a href="#"
           style="font-size: 10px">{{ $door->name }}
        </a>
    </div>

    <input type="hidden"
           name="{{ $door->name }}"
           x-model="selected"
    />
</div>

