@props(['active' => true])

<td class="px-6 py-4 whitespace-nowrap">
    <div x-data="{
      expired: {{ ! $active }},
    }"
         {{ $attributes(['class' => 'text-xs font-semibold text-gray-500 hover:text-pink-500']) }}
         :class="expired && 'text-gray-300'"
    >

            {{ $slot }}

        </div>
    </div>
</td>
