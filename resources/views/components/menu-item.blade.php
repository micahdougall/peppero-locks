@props(['route'])

<a href="{{ route($route) }}"
    @class([
         'block hover:bg-emerald-500 hover:text-white text-sm px-4 py-1',
         'text-white bg-cyan-500' => Route::currentRouteName() == $route
     ])>
    {{ $slot }}
</a>
