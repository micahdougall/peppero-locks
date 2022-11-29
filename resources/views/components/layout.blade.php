<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width-device-width, initial-scale=1.0"/>
    <title>CSF304 Web Apps with Laravel - Coursework 2</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/datepicker.js"></script>

    {{--Tailwind Play CDN for Development only--}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>
<body style="font-family: Open Sans, sans-serif">

<header>
    <div class="flex mx-auto inline-block pt-6">
        <a href="{{ route('home') }}" class="mx-auto">
            <img class="mx-auto w-36 h-24 object-cover"
                 src="/images/peppero.png"
                 alt="Peppero Logo">
        </a>
    </div>

    <div>
        <x-navigation heading="{{ $heading }}"/>
    </div>
</header>

{{--<main class="mx-auto flex items-center justify-center max-w-4xl min-h-screen my-10">--}}
<main class="mx-auto max-w-4xl min-h-screen space-y-4">

        <div class="flex mx-auto items-start my-6">
            {{ $slot }}
        </div>

        <footer class="mx-auto max-w-4xl mb-6">
            <div class="mx-auto bg-gray-50 border border-black border-opacity-5 rounded-xl text-center py-8 mb-2 max-w-4xl">
                <p class="text-sm mb-0 text-gray-400">made with</p>
                <a href="https://www.laravel.com" class="inline-flex items-center">
                    <img src="/images/logomark.min.svg" alt="Laravel" class="w-12" width="50" height="52">
                    <img src="/images/logoheart.min.svg" alt="Laravel" class="ml-5 sm:block" width="114" height="29">
                </a>
            </div>
            <p class="text-xs text-gray-500">&copy; 2022 Peppero Locks Ltd.</p>
            <x-flash/>
        </footer>
    </div>
</main>


</body>
</html>
