<x-layout>
    <x-setting heading="Manage Zones" class="max-w-6xl">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($zones as $zone)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="text-sm font-semibold text-gray-500 hover:text-gray-900">
                                                <a href="/zones/{{ $zone->id }}">
                                                    {{ $zone->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center space-x-2">
                                                @foreach($zone->doors as $door)
                                                    <x-door-button :door="$door"/>
                                                @endforeach
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/zones/{{ $zone->id }}/edit"
                                           class="px-4 py-1 text-xs leading-5 font-semibold rounded shadow-sm
                                           text-gray-800 bg-gray-100 uppercase
                                           hover:bg-green-700 hover:text-white focus:ring hover:shadow-lg">
                                            Edit
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/zones/{{ $zone->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="inline-flex px-3 text-xs leading-5 font-semibold uppercase
                                                    text-gray-400 hover:text-red-800 hover:font-extrabold">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
