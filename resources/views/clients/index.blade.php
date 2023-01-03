<x-app-layout>
    <x-slot name="header">
        {{ __('Clients') }}
    </x-slot>

    @can('create clients')
        <div class="mb-4 flex justify-between">
            <a class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked" href="{{ route('clients.create') }}">
                Create
            </a>
        </div>
    @endcan

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">VAT</th>
                        <th class="px-4 py-3">Address</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($clients as $client)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    {{ $client->contact_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $client->company_vat }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $client->company_address }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @can('edit clients')
                                        <a class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked" href="{{ route('clients.edit', $client->id) }}">Edit</a>
                                    @endcan

                                    @can('delete clients')
                                        <form action="{{ route('clients.destroy', $client) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked">Delete</button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                {{ $clients->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
