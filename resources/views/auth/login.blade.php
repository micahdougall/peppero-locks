<x-layout heading="Welcome">
    <x-content class="w-96">
        <h1 class="text-center font-bold text-xl">Log in</h1>

        <form method="POST" action="{{ route('login') }}" class="mt-10">
            @csrf

            <x-form.input name="email" type="email" autocomplete="username"/>
            <x-form.input name="password" type="password" autocomplete="password"/>
            <x-form.button>Log In</x-form.button>
        </form>
    </x-content>
</x-layout>
