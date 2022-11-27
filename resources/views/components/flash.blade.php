@if(session()->has('success'))
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed py-2 px-4 rounded bg-amber-500 text-white rounded-xl text-sm top-0 right-0 mt-1 mr-1">
        <p>{{ session('success') }}</p>
    </div>
@endif
