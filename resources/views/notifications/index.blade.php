<x-app-layout>
    <x-slot name="header">
        {{ __('Notifications') }}
    </x-slot>

    <div class="mb-4 flex justify-between">
        @if ($notifications->count())
        <form action="{{ route('notifications.destroy', auth()->user()) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked">Mark all as read</button>
        </form>
        @endif
    </div>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Sent at</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($notifications as $notification)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $notification->data['type'] }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $notification->data['title'] }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $notification->created_at->diffForHumans() }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <form action="{{ route('notifications.update', $notification->id) }}" method="POST">
                                    @csrf

                                    <button type="submit" class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked">Mark as read</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
            </div>
        </div>

    </div>
</x-app-layout>
