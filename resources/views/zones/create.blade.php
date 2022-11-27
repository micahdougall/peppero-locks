<x-layout heading="Create New Zone">
    <x-content>
        <form method="POST" action="/zones" enctype="multipart/form-data">
            @csrf

            <x-form.input name="name"/>

            <x-form.button>Add</x-form.button>
        </form>
    </x-content>
</x-layout>

