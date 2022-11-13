<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CSF304 Web Apps with Laravel - Coursework 2</title>

{{--    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">--}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="/js/app.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>


    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

</head>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-center md:items-center">
        <div>
            <a href="/">
                <img src="/images/peppero.png" alt="Laracasts Logo" width="165" height="16">
            </a>
            <div class="flex justify-center items-center">
                @auth
                    <div class="space-x-2">
                        <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>

                        <a class="text-xs font-bold uppercase"
                           href="#"
                           x-data="{}"
                           @click.prevent="document.querySelector('#logout-form').submit();"
                        >Log Out</a>

                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </div>
                @else
                    <a href="/login" class="ml-5 text-xs font-bold uppercase">Log In</a>
                @endauth
            </div>
        </div>
    </nav>

    {{ $slot }}

    <footer
        id="newsletter"
        class="bg-gray-200 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <div class="flex-1">
            <p class="text-sm mb-0 text-gray-400">made with</p>
            <a href="/" class="inline-flex items-center">
                <img src="/images/logomark.min.svg" alt="Laravel" class="w-12" width="50" height="52">
                <img src="/images/logoheart.min.svg" alt="Laravel" class="ml-5 sm:block" width="114" height="29">
            </a>
        </div>
        <x-flash/>

    </footer>
</section>
</body>
</html>
