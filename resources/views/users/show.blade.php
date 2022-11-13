<x-layout>
    <x-panel class="bg-gray-50 mt-6 w-6/12">
        <article class="flex space-x-4">
            <div style="flex-shrink: 1">
                <img src="https://i.pravatar.cc/200?u={{ $user->id }}" alt="" style="width: 100px" class="rounded-xl"/>
            </div>

            <div>
                <div class="flex">
                    <p class="text-sm">
                        User ID: {{ $user->id }}
                    </p>
{{--                    <p>--}}
{{--                        {{ $user->isAdmin() ? 'Admin' : '' }}--}}
                        @if($user->isAdmin())
{{--                            <p>Admin</p>--}}
                        <x-admin-label></x-admin-label>
                        @endif
{{--                    </p>--}}
                </div>
                <header class="mb-2">
                    <h3 class="font-bold">{{ $user->first_name . ' ' . $user->last_name }}</h3>
                </header>
                <p class="italic text-sm">
                    {{ $user->email }}
                </p>
                <p class="text-xs mt-6 text-gray-400">
                    <time>Created {{ $user->created_at->diffForHumans() }}</time>
                </p>
                <div class="flex space-x-2">
                    @foreach ($user->zones as $zone)
                        <div class="space-x-2 mt-6">
                            <x-zone-button :zone="$zone"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>
    </x-panel>
</x-layout>
