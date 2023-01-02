<x-app-layout>
    <x-slot name="header">
        {{ __('Tasks') }}
    </x-slot>

    @can('create tasks')
        <div class="mb-4 flex justify-between">
            <a class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked" href="{{ route('tasks.create') }}">
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
                        <th class="px-4 py-3">Project</th>
                        <th class="px-4 py-3">Assigned team</th>
                        <th class="px-4 py-3">Assigned user</th>
                        <th class="px-4 py-3">Deadline</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($tasks as $task)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-sm">
                                    <a href="{{ route('tasks.show', $task) }}" class="text-blue-500 no-underline hover:underline">
                                        {{ $task->title }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $task->project->title }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $task->team->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $task->user->name }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $task->deadline }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $task->status }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    @can('edit tasks')
                                        <a class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                                    @endcan

                                    @can('delete tasks')
                                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                {{ $tasks->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
