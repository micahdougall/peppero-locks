<x-layout :heading="$user->first_name . ' ' . $user->last_name">
    <x-content class="w-96">
        <div class="space-y-2">

            <div class="flow-root">
                <div>
                    <p class="text-xs text-gray-600 italic float-right">
                        User ID: {{ $user->id }}
                    </p>
                </div>
                <div>
                    <div style="flex-shrink: 1">
                        <img src="https://i.pravatar.cc/200?u={{ $user->id }}" alt="" style="width: 100px" class="rounded-xl"/>
                    </div>
                </div>
            </div>

            <div class="flex space-x-2">
                <div>
                    <h3 class="font-bold">{{ $user->first_name . ' ' . $user->last_name }}</h3>
                    <p class="italic text-sm">
                        {{ $user->email }}
                    </p>
                    @if($user->isAdmin())
                        <p class="text-purple-500 text-xs uppercase font-semibold">Admin</p>
                    @endif
                    @if(!$user->isActive())
                        <p class="text-red-600 text-xs uppercase font-semibold">Expired</p>
                    @endif
                </div>
            </div>

            <hr>

            @if($user->zones->count())
                <h3 class="mt-4 text-sm font-semibold text-gray-5 hover:text-gray-900">Zones</h3>
            @else
                <h3 class="mt-4 text-sm font-semibold text-gray-5 hover:text-gray-900">No zones assigned to this user</h3>
            @endif

            <div class="flex space-x-2 mt-4">
                <div class="grid grid-cols-5 gap-3 place-items-stretch">
                    @foreach ($user->zones as $zone)
                        <x-zone-button :zone="$zone"/>
                    @endforeach
                </div>
            </div>
            <div>
                <p class="text-xs mt-6 text-gray-400">
                    <time>Created {{ $user->created_at->diffForHumans() }}</time>
                </p>
            </div>
        </div>
    </x-content>
</x-layout>
