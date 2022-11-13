@props(['zone'])
<div
    class="flex px-3 py-1 border border-green-600 rounded-full text-green-600 text-xs uppercase font-semibold space-x-1 space-y-1 hover:border-green-700 hover:text-green-700 hover:bg-green-50">
    <div>
        <a href="/?category={{ $zone->id }}"
           style="font-size: 10px">{{ $zone->name }}
        </a>
    </div>
{{--    <div>--}}
{{--        <img src="/images/{{ $nationality->name }}.svg" alt="nationality flag" style="width: 10px" class="rounded-sm"/>--}}
{{--    </div>--}}
</div>
