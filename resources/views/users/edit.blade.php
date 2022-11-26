<x-layout>
    <x-setting :heading="'Edit ' . $user->title . ' ' . $user->first_name . ' ' . $user->surname" class="max-w-3xl">
        <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data"
{{--            x-data="{--}}
{{--                nationalities: {{ $nationalities }},--}}

{{--                oldNationalities: {{ $user->nationalities }},--}}

{{--                name: 'test'--}}
{{--            }"--}}
{{--              x-modelable="name"--}}
        >
            @csrf
            @method('PATCH')

            <x-form.input textarea name="first_name" :value="old('first_name', $user->first_name)"/>
            <x-form.input textarea name="last_name" :value="old('last_name', $user->last_name)"/>
            <x-form.input textarea name="email" :value="old('email', $user->email)"/>
{{--            <x-form.input textarea name="password" :value="old('password', $user->password)"/>--}}

{{--            <x-form.field>--}}
{{--                <x-form.label name="Nationalities"/>--}}
{{--                <div class="flex space-x-2">--}}
{{--                    @foreach($nationalities as $nationality)--}}
{{--                        <x-form.nationality-select :nationality="$nationality"/>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </x-form.field>--}}

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

    </x-setting>
</x-layout>
