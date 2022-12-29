<x-app-layout>
    <x-slot name="header">
        {{ __('Edit task') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-md">
        @livewire('edit-task', compact('task'))
    </div>
</x-app-layout>
