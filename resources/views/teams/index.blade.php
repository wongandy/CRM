<x-app-layout>
    <x-slot name="header">
        {{ __('Teams') }}
    </x-slot>

    @can('create teams')
        <div class="mb-4 flex justify-between">
            <a class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked" href="{{ route('teams.create') }}">
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
                        <th class="px-4 py-3">Members</th>
                        <th class="px-4 py-3">Created by</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($teams as $team)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    {{ $team->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ implode(', ', $team->members->pluck('name')->toArray()) }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $team->user->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @can('edit teams')
                                        <a class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked" href="{{ route('teams.edit', $team->id) }}">Edit</a>
                                    @endcan

                                    @can('delete teams')
                                        <form action="{{ route('teams.destroy', $team) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                {{ $teams->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
