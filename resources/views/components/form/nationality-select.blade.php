<div
        x-model="nationalities.{{ $nationality->name }}"
        x-data="{
            selected () {
                return oldNationalities.some((value) => value.name === {{ $nationality->name }}.name);
            }
        }"
>

    <button type="button"
            @click="nationalities.{{ $nationality->name }} = ! nationalities.{{ $nationality->name }}"
            x-ref="button"
            class="flex px-3 py-1 border rounded-full text-xs uppercase font-semibold space-x-1 space-y-1
            border-gray-300 text-gray-300 hover:border-green-700 hover:text-green-700 hover:bg-green-50"
            :class="{ 'border-green-600 text-green-600 bg-white':  nationalities.{{ $nationality->name }} }"
    >
        <div>
            <p style="font-size: 10px">{{ $nationality->name }}</p>
        </div>
        <div>
            <img class="rounded-sm fill-blue opacity-25"
                 :class="nationalities.{{ $nationality->name }} && 'opacity-100'"
                 src="/images/{{ $nationality->name }}.svg"
                 alt="nationality flag"
                 style="width: 10px"
            />
        </div>
    </button>

        <x-form.input textarea name="Nats"
                      x-model="selected"
        />

    <button type="button"
            x-model="selected"
            class="flex px-3 py-1 border rounded-full text-xs uppercase font-semibold space-x-1 space-y-1
            border-gray-300 text-gray-300 hover:border-green-700 hover:text-green-700 hover:bg-green-50"
            :class="{ 'border-green-600 text-green-600 bg-white': selected }"
    >
        <div>
            <p style="font-size: 10px">{{ $nationality->name }}</p>
        </div>
        <div>
            <img class="rounded-sm fill-blue opacity-25"
                 :class="true && 'opacity-100'"
                 src="/images/{{ $nationality->name }}.svg"
                 alt="nationality flag"
                 style="width: 10px"
            />
        </div>
    </button>

    <input type="hidden"
           id="{{ $nationality->name }}"
           name="{{ $nationality->name }}"
           x-model="nationalities.{{ $nationality->name }}"
    />
</div>
