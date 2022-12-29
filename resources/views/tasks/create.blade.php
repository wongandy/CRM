<x-app-layout>
    <x-slot name="header">
        {{ __('Create task') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-md">
       @livewire('create-task')
    </div>
</x-app-layout>
