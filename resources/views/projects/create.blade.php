<x-app-layout>
    <x-slot name="header">
        {{ __('Create project') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-md">

        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <x-input-label for="title" :value="__('Title')"/>
                <x-text-input type="text"
                         id="title"
                         name="title"
                         class="block w-full"
                         value="{{ old('title') }}"
                         />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-textarea id="description" class="block mt-1 w-full" type="text" name="description">{{ old('description') }}</x-textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="deadline" :value="__('Deadline')"/>
                <x-text-input type="date"
                         id="deadline"
                         name="deadline"
                         class="block w-full"
                         value="{{ old('deadline') }}"
                         />
                <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="client_id" :value="__('Assigned client')" />

                <select name="client_id" id="client_id" class="block mt-1 w-full">
                    @foreach ($clients as $id => $entry)
                        <option value="{{ $id }}" {{ old('client_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="user_id" :value="__('Assigned user')" />

                <select name="user_id" id="user_id" class="block mt-1 w-full">
                    @foreach ($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="user_id" :value="__('Status')" />

                <select name="status" id="status" class="block mt-1 w-full">
                    @foreach (App\Enums\Project\Statuses::cases() as $status)
                        <option value="{{ $status->value }}" {{ old('status') == $status->value ? 'selected': ''}}>{{ $status->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="upload" :value="__('File upload')"/>
                <x-text-input type="file"
                         id="upload"
                         name="upload"
                         class="block w-full"
                         />
                <x-input-error :messages="$errors->get('upload')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
