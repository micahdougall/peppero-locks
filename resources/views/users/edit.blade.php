<x-layout :heading="'Edit ' . $user->title . ' ' . $user->first_name . ' ' . $user->surname">
    <x-content class="w-9/12">
        <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data"
{{--              x-data="{--}}
{{--                zones: {{ $user->zones }}--}}
{{--              }"--}}
        >
            @csrf
            @method('PATCH')

            <div class="flex space-x-6">
                <div class="w-6/12">

                    <x-form.input textarea name="first_name" :value="old('first_name', $user->first_name)"/>
                    <x-form.input textarea name="last_name" :value="old('last_name', $user->last_name)"/>
                    <x-form.input textarea name="email" :value="old('email', $user->email)"/>

                    <div class="form-check">
                        <input type="checkbox"
                               class="form-check-input h-4 w-4
                              border border-gray-300 rounded-sm bg-white
                              checked:bg-blue-600 checked:border-blue-600
                              focus:outline-none transition duration-200
                              mt-1 align-top bg-no-repeat bg-center bg-contain
                              float-left mr-2 cursor-pointer"
                               name="admin_flag"
                               id="admin_flag"
                            @checked(old('admin_flag', $user->admin_flag))
                        >
                        <label class="form-check-label inline-block font-bold text-xs text-gray-700 block mb-6"
                               for="admin_flag">
                            Admin user
                        </label>
                    </div>

                    <label class="block mb-2 font-bold text-xs text-gray-700"
                           for="expiry_date">
                        Expiry date
                    </label>
                    <div class="relative mb-6">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true"
                                 class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                 fill="currentColor"
                                 viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg"
                            >
                                <path fill-rule="evenodd"
                                      d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2
                                0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                      clip-rule="evenodd">
                                </path>
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text"
                               class="bg-gray-50 border border-gray-300
                              text-gray-900 text-sm rounded-lg
                              block w-full pl-10 p-2.5"
                               placeholder="Select date"
                               id="expiry_date"
                               name="expiry_date"
                               value="{{ Carbon\Carbon::createFromFormat('Y-m-d', old('expiry_date', $user->expiry_date))->format('m/d/Y') }}"
                        >
                    </div>
                </div>

                <div class="flex flex-col max-h-96 w-72">
                    <div class="overflow-hidden hover:overflow-y-scroll overscroll-contain pr-6 pl-2 py-2">
                        <div>
                            @if($user->zones->count())
                                <h3 class="mt-4 text-sm font-semibold text-gray-5 hover:text-gray-900">Zones</h3>
                                <div class="flex space-x-2 mt-4">
                                    <div class="grid grid-cols-4 gap-3 place-items-stretch">
                                        @foreach ($user->zones as $zone)
                                            <x-user-zone-button :zone="$zone"/>
                                        @endforeach
                                    </div>
                                </div>
                                <hr class="mt-6">
                            @endif
                        </div>

                        <div>
                            @if($user->doors->count())
                                <h3 class="mt-4 text-sm font-semibold text-gray-5 hover:text-gray-900">Direct Doors</h3>
                                <div class="flex space-x-2 mt-4">
                                    <div class="grid grid-cols-4 gap-3 place-items-stretch">
                                        @foreach ($user->doors as $door)
                                            <x-door-button :door="$door"/>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <x-form.button :back="'users.index'">Update</x-form.button>
        </form>
    </x-content>
</x-layout>
