{{--@props(['route'])--}}
@php
    $classes = 'flex px-3 py-1 border rounded-full text-xs uppercase font-semibold space-x-1 space-y-1
    border-gray-300 text-gray-300
    hover:border-green-700 hover:text-green-700 hover:bg-green-50';

    $nationalities = ["British", "French"];
@endphp

<x-layout>
    <form method="POST" action="/people" enctype="multipart/form-data"
        x-data="{
            form: {
                nationalityList: [],
                name: 'Type name here'
            },
            flipNationality(nation) {
                if (this.form.nationalityList.includes(nation)) {
                    this.form.nationalityList = this.form.nationalityList.filter(
                        (n) => n !== nation
                    )
                } else {
                    this.form.nationalityList.push(nation)
                }
            }
        }"
    >
        @csrf

        <input type="hidden" id="nationalities" name="nationalities" x-model="form.nationalityList"/>
        <div>
            <div class="flex space-x-2 py-10">
                @foreach($nationalities as $nationality)
                    <div x-data="{ selected: false }">
                        <button type="button"
                                @click="selected = ! selected; flipNationality('{{ $nationality }}')"
                                class="flex px-3 py-1 border rounded-full text-xs uppercase font-semibold space-x-1 space-y-1
                                border-gray-300 text-gray-300 hover:border-green-700 hover:text-green-700 hover:bg-green-50"
                                :class="{ 'border-green-600 text-green-600 bg-white':  selected }"
                        >{{ $nationality }}</button>
                    </div>
                @endforeach
            </div>
            <button
                type="submit"
                class="bg-blue-500 rounded-full pd-2 px-3 py-1"
            >Publish
            </button>

            <template x-for="nation in form.nationalityList">
                <li x-text="nation"></li>
            </template>
            <p x-text="form.nationalityList"></p>

{{--            <template x-for="nation in form.nationalityList" :key="nation">--}}
{{--                <input type="hidden" id="" name="nations" x-model="nation">--}}
{{--            </template>--}}
        </div>

    </form>
</x-layout>
