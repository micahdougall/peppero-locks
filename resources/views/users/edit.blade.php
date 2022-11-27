<x-layout :heading="'Edit ' . $user->title . ' ' . $user->first_name . ' ' . $user->surname">
    <x-content>
        <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input textarea name="first_name" :value="old('first_name', $user->first_name)"/>
            <x-form.input textarea name="last_name" :value="old('last_name', $user->last_name)"/>
            <x-form.input textarea name="email" :value="old('email', $user->email)"/>

            <x-form.error name="first_name"/>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <x-form.button>Update</x-form.button>
        </form>
    </x-content>
</x-layout>
