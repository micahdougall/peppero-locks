<x-layout heading="Manage Users">
    <x-content>
        @if($users->count())
            <x-table.frame>
                <thead class="border-b">
                <tr>
                    <x-table.header>Name</x-table.header>
                    <x-table.header>Email</x-table.header>
                    <x-table.header>Admin</x-table.header>
                    <x-table.header>Zones</x-table.header>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <x-table.cell :active="$user->isActive()">
                            <a href="{{ route('users.show', ['user' => $user]) }}">
                                {{ $user->first_name . ' ' . $user->last_name }}
                            </a>
                        </x-table.cell>
                        <x-table.cell :active="$user->isActive()">
                            <a href="{{ route('users.show', ['user' => $user]) }}">
                                {{ $user->email }}
                            </a>
                        </x-table.cell>
                        <x-table.cell class="text-center" :active="$user->isActive()">
                            <a href="{{ route('users.show', ['user' => $user]) }}">
                                {{ $user->isAdmin() ? 'Yes' : 'No' }}
                            </a>
                        </x-table.cell>
                        <x-table.cell class="text-center" :active="$user->isActive()">
                            <a href="{{ route('users.show', ['user' => $user]) }}">
                                {{ count($user->zones) }}
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <a href="{{ route('users.edit', ['user' => $user]) }}"
                               class="px-4 py-1 text-xs leading-5 font-semibold rounded shadow-sm
                                  text-gray-800 bg-gray-100 uppercase
                                  hover:bg-emerald-500 hover:text-white focus:ring hover:shadow-lg">
                                Edit
                            </a>
                        </x-table.cell>
                        <x-table.cell>
                            <form method="POST" action="{{ route('users.destroy', ['user' => $user]) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="inline-flex px-3 text-xs leading-5 font-semibold uppercase
                                           text-gray-400 hover:text-amber-500 hover:font-extrabold">
                                    Delete
                                </button>
                            </form>
                        </x-table.cell>
                    </tr>
                @endforeach
                </tbody>
            </x-table.frame>
        @else
            <p class="ext-xs leading-5 font-semibold text-gray-400">
                No users exist, please create a new user
            </p>
        @endif
    </x-content>
</x-layout>
