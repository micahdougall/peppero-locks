@props(['zone'])
<div
    class="flex px-2.5 py-1 space-x-1 space-y-1
           border-y rounded-full border-pink-500 shadow-sm shadow-pink-500/50
           text-xs uppercase font-semibold text-pink-600 whitespace-nowrap text-center
           hover:border-pink-700 hover:text-pink-700 hover:bg-pink-50">
    <div>
        <a href="/zones/{{ $zone->id }}"
           style="font-size: 10px">{{ $zone->name }}
        </a>
    </div>
</div>
