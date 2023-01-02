<x-app-layout>
    <x-slot name="header">
        {{ __('Projects') }}
    </x-slot>

    @can('create projects')
        <div class="mb-4 flex justify-between">
            <a class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked" href="{{ route('projects.create') }}">
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
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Assigned team</th>
                        <th class="px-4 py-3">Client</th>
                        <th class="px-4 py-3">Deadline</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($projects as $project)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    <a href="{{ route('projects.show', $project) }}" class="text-blue-500 no-underline hover:underline">
                                        {{ $project->title }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ implode(', ', $project->teams->pluck('name')->toArray()) }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $project->client->company_name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $project->deadline }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $project->status }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @can('edit projects')
                                        <a class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked" href="{{ route('projects.edit', $project->id) }}">Edit</a>
                                    @endcan

                                    @can('delete projects')
                                        <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                {{ $projects->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
