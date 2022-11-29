@props(['heading' => ''])

<nav class="mx-auto max-w-4xl grid grid-cols-3 mb-2 pb-2 border-b items-center">

    <div class="flex items-center space-x-4">
        <x-back/>
        <h1 class="text-lg font-bold text-sky-500">
            {{ $heading }}
        </h1>
    </div>

    {{--Admin menus--}}
    @admin
        <div class="flex mx-auto mt-8 md:mt-0 items-center space-x-10">
            <x-menu header="Zones">
                <x-menu-item :route="'zones.create'">
                    Create new zone
                </x-menu-item>
                <x-menu-item :route="'zones.index'">
                    Manage zones
                </x-menu-item>
            </x-menu>

            <x-menu header="Doors">
                <x-menu-item :route="'doors.create'">
                    Create new door
                </x-menu-item>
                <x-menu-item :route="'doors.index'">
                    Manage doors
                </x-menu-item>
            </x-menu>

            <x-menu header="Users">
                <x-menu-item :route="'users.create'">
                    Create new user
                </x-menu-item>
                <x-menu-item :route="'users.index'">
                    Manage users
                </x-menu-item>
            </x-menu>
        </div>
    @else
        <div></div>
    @endadmin

    {{--Log in/out menu--}}
    @auth
        <div class="place-self-end">
            <x-menu>
                <x-menu-item :route="'account.dashboard'">
                    Dashboard
                </x-menu-item>

                <a href="{{ route('account.edit', ['user' => auth()->user()]) }}"
                    @class([
                         'block hover:bg-emerald-500 hover:text-white text-sm px-4 py-1',
                         'text-white bg-cyan-500' => Route::currentRouteName() == route('account.edit', ['user' => auth()->user()])
                     ])>
                    My Account
                </a>

                <x-slot name="header">
                    <img class="rounded-full shadow w-36 grayscale hover:grayscale-0"
                         src="https://i.pravatar.cc/200?u={{ auth()->user()->id }}"
                         alt="" style="width: 50px"/>
                </x-slot>

                <a href="{{ route('home') }}"
                   class="block hover:bg-green-600 hover:text-white text-sm px-4 py-1"
                   @click.prevent="document.querySelector('#logout-form').submit();"
                >Log Out</a>
                <form id="logout-form" method="POST" action="{{ route('logout') }}" class="hidden">
                    @csrf
                </form>
            </x-menu>
        </div>
    @else
        <div class="place-self-end">
            <a href="{{ route('login') }}" class="ml-5 text-xs font-bold uppercase">Log In</a>
        </div>
    @endauth
</nav>
