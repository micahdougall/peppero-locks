@props(['heading' => 'No heading'])

<section class="mx-auto py-8 max-w-4xl">
    <nav class="md:flex md:justify-between md:items-center mb-8 pb-2 border-b max-w-4xl">

        <h1 class="text-lg font-bold text-sky-500">
            {{ $heading }}
        </h1>

        {{--Admin options in menu bar--}}
        @admin
            <div class="flex mx-auto mt-8 md:mt-0 items-center space-x-10">
                <div x-data="{ show: false }" @click.away="show = false">
                    <button @click="show = ! show"
                            class="text-md font-semibold text-gray-5 hover:text-gray-900"
                    >Zones
                    </button>

                    <div class="absolute py-2 bg-gray-100 rounded-xl mt-1 w-36 space-y-0"
                         x-show="show"
                         x-transition:enter="transition duration-250 transform"
                         x-transition:enter-start="scale-80 opacity-50"
                         x-transition:leave="transition duration-200 transform"
                         x-transition:leave-end="scale-90 opacity-0"
                    >
                        <a href={{ route('zones.index') }}
                            @class([
                                 'block hover:bg-green-600 hover:text-white text-sm px-4 py-1',
                                 'text-green-800 bg-green-50' => request()->is('zones')
                             ])
                        >My zones</a>
                        <a href={{ route('zones.create') }}
                            @class([
                                 'block hover:bg-green-600 hover:text-white text-sm px-4 py-1',
                                 'text-green-800 bg-green-50' => request()->is('zones/create')
                             ])
                        >Create new zone</a>
                        <a href="{{ route('zones.index') }}"
                            @class([
                                 'block hover:bg-green-600 hover:text-white text-sm px-4 py-1',
                                 'text-green-800 bg-green-50' => request()->is('zones')
                             ])
                        >Manage zones</a>
                    </div>
                </div>

                <div x-data="{ show: false }" @click.away="show = false">
                    <button @click="show = ! show"
                            class="text-md font-semibold text-gray-5 hover:text-gray-900"
                    >Doors
                    </button>

                    <div class="absolute py-2 bg-gray-100 rounded-xl mt-1 w-36 space-y-0"
                         x-show="show"
                         x-transition:enter="transition duration-250 transform"
                         x-transition:enter-start="scale-80 opacity-50"
                         x-transition:leave="transition duration-200 transform"
                         x-transition:leave-end="scale-90 opacity-0"
                    >
                        <a href={{ route('doors.create') }}
                            @class([
                                 'block hover:bg-green-600 hover:text-white text-sm px-4 py-1',
                                 'text-green-800 bg-green-50' => request()->is('doors/create')
                             ])
                        >Create new door</a>
                        <a href="{{ route('doors.index') }}"
                            @class([
                                 'block hover:bg-green-600 hover:text-white text-sm px-4 py-1',
                                 'text-green-800 bg-green-50' => request()->is('doors')
                             ])
                        >Manage doors</a>
                    </div>
                </div>
                <div x-data="{ show: false }" @click.away="show = false">
                    <button @click="show = ! show"
                            class="text-md font-semibold text-gray-5 hover:text-gray-900"
                    >Users
                    </button>

                    <div class="absolute py-2 bg-gray-100 rounded-xl mt-1 w-36 space-y-0"
                         x-show="show"
                         x-transition:enter="transition duration-250 transform"
                         x-transition:enter-start="scale-80 opacity-50"
                         x-transition:leave="transition duration-200 transform"
                         x-transition:leave-end="scale-90 opacity-0"
                    >
                        <a href={{ route('users.create') }}
                            @class([
                                 'block hover:bg-green-600 hover:text-white text-sm px-4 py-1',
                                 'text-green-800 bg-green-50' => request()->is('users/create')
                             ])
                        >Create new user</a>
                        <a href="{{ route('users.index') }}"
                            @class([
                                 'block hover:bg-green-600 hover:text-white text-sm px-4 py-1',
                                 'text-green-800 bg-green-50' => request()->is('users')
                             ])
                        >Manage users</a>
                    </div>
                </div>
            </div>
        @endadmin

        {{--Log in or out menu--}}
        <div>
            @auth
                <div x-data="{ show: false }" @click.away="show = false"
                    class="space-x-2"
                >
                    <button @click="show = ! show">
                        <img class="rounded-full shadow w-36"
                             src="https://i.pravatar.cc/200?u={{ auth()->user()->id }}"
                             alt="" style="width: 50px"
                        />
                    </button>

                    <div class="absolute py-2 bg-gray-100 rounded-xl mt-1 w-36 space-y-0"
                         x-show="show"
                         x-transition:enter="transition duration-250 transform"
                         x-transition:enter-start="scale-80 opacity-50"
                         x-transition:leave="transition duration-200 transform"
                         x-transition:leave-end="scale-90 opacity-0"
                    >
                        <a href="#"
                           class="block hover:bg-green-600 hover:text-white text-sm px-4 py-1"
                           @click.prevent="document.querySelector('#logout-form').submit();"
                        >Log Out</a>
                        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a href="/login" class="ml-5 text-xs font-bold uppercase">Log In</a>
            @endauth
        </div>
    </nav>
{{--    <a href="{{ URL::previous() }}">Back</a>--}}
</section>
