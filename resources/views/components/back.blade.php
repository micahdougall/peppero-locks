@if(URL::previous() != Route::currentRouteName() && Route::currentRouteName() != 'home')
    <a href="{{ URL::previous() }}"
       class="px-6 py-2 rounded shadow-md
              text-gray-600 font-bold text-xs
              hover:bg-fuchsia-300 hover:text-white focus:outline-none focus:ring hover:shadow-lg">
        &#8592
    </a>
@endif
