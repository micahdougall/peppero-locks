<x-layout heading="">
    <div class="w-full space-y-3 mr-20">
        <h1 class="text-4xl text-cyan-600 text-bold mt-10">
            Peppero
        </h1>
        <p class="text-xl text-gray-800 text-semibold">
            Lock Management System
        </p>
        <p class="text-gray-500 py-4">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi doloribus est fugit qui, quos recusandae ut! Assumenda deleniti dolorum, exercitationem facere laborum nihil, provident quia quod rerum sint, voluptates voluptatum.
        </p>

        @guest
            <div class="flex space-x-2 justify-center">
                <a href="{{ route('login') }}"
                   class="px-6 py-2 text-xs rounded shadow-md
                  text-white font-semibold uppercase
                  bg-amber-400 hover:bg-amber-500 focus:outline-none focus:ring hover:shadow-lg">
                    Log in
                </a>
            </div>
        @endguest
    </div>
    <div>
        <div>
            <img class="py-3 px-2"
                 src="/images/zones.png"
                 alt="Zone plan overiew" width="400" height="16">
        </div>
        <div>
            <img class="py-3 px-2"
                 src="/images/doors.jpg"
                 alt="Zone plan overiew" width="400" height="16">
            <hr>
        </div>
    </div>

</x-layout>
