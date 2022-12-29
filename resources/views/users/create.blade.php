<x-app-layout>
    <x-slot name="header">
        {{ __('Create user') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-md">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mt-4">
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input type="text"
                         id="name"
                         name="name"
                         class="block w-full"
                         value="{{ old('name') }}"
                         />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')"/>
                <x-text-input name="email"
                         type="email"
                         class="block w-full"
                         value="{{ old('email') }}"
                         />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')"/>
                <x-text-input name="address"
                         type="text"
                         class="block w-full"
                         value="{{ old('address') }}"
                         />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Phone number')"/>
                <x-text-input name="phone_number"
                         type="number"
                         class="block w-full"
                         value="{{ old('phone_number') }}"
                         />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="roles" :value="__('Roles')"/>
                @foreach ($roles as $id => $role)
                    <div class="mt-1 inline-flex space-x-1">
                        <input type="radio" name="role" id="role-{{ $id }}" value="{{ $id }}" @checked(old('role') ? old('role') == $id : $id == \App\Enums\RolesEnum::USER->value)>
                        <x-input-label for="role-{{ $id }}">{{ $role }}</x-input-label>
                    </div>
                @endforeach
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
