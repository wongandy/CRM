<x-app-layout>
    <x-slot name="header">
        {{ __('Edit team') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-md">

        <form action="{{ route('teams.update', $team) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input type="text"
                         id="name"
                         name="name"
                         class="block w-full"
                         value="{{ old('name', $team->name) }}"
                         />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="members" :value="__('Members')"/>
                
                @foreach ($members as $id => $member)
                <div class="mt-1 inline-flex space-x-1">
                        <input type="checkbox" name="members[]" id="member-{{ $id }}" value="{{ $id }}" @checked(old('members') ? in_array($id, old('members')) : in_array($id, $team->members->pluck('id')->toArray()))>
                        <x-input-label for="member-{{ $id }}">{{ $member }}</x-input-label>
                    </div>
                    <br>
                @endforeach
                <x-input-error :messages="$errors->get('members')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>

    </div>
</x-app-layout>
