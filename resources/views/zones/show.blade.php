<x-layout>
    <x-panel class="bg-gray-50 mt-6 w-6/12">
        <article class="flex space-x-4">
{{--            <div style="flex-shrink: 1">--}}
{{--                <img src="https://i.pravatar.cc/200?u={{ $zone->id }}" alt="" style="width: 100px" class="rounded-xl"/>--}}
{{--            </div>--}}

            <div>
                <header class="mb-2">
                    <h3 class="font-bold">{{ $zone->name }}</h3>
                </header>
                <p class="italic">
                    {{ $zone->is }}
                </p>
                <p class="text-xs mt-6 text-gray-400">
                    <time>Created {{ $zone->created_at->diffForHumans() }}</time>
                </p>

{{--                <div class="flex space-x-2">--}}
{{--                    @foreach ($zone->nationalities as $nationality)--}}
{{--                        <div class="space-x-2 mt-6">--}}
{{--                            <x-nationality-button :nationality="$nationality"/>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
            </div>
        </article>
    </x-panel>
</x-layout>
