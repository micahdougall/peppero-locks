@props(['door'])
<div
    class="flex px-3 py-1 space-x-1 space-y-1
           border-y rounded-full border-cyan-500 shadow-sm shadow-cyan-500/50
           text-xs uppercase font-semibold text-cyan-600
           hover:border-cyan-700 hover:text-cyan-700 hover:bg-cyan-50">
    <div>
        <a href="/doors/{{ $door->id }}"
           style="font-size: 10px">{{ $door->name }}
        </a>
    </div>
</div>
