<x-app-layout>
    <x-slot name="header">
        {{ __('Edit project') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-md">

        <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <x-input-label for="title" :value="__('Title')"/>
                <x-text-input type="text"
                         id="title"
                         name="title"
                         class="block w-full"
                         value="{{ old('title', $project->title) }}"
                         />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-textarea id="description" class="block mt-1 w-full" type="text" name="description">{{ old('description', $project->description) }}</x-textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="deadline" :value="__('Deadline')"/>
                <x-text-input type="date"
                         id="deadline"
                         name="deadline"
                         class="block w-full"
                         value="{{ old('deadline', $project->deadline) }}"
                         />
                <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="client_id" :value="__('Assigned client')" />

                <select name="client_id" id="client_id" class="block mt-1 w-full">
                    @foreach ($clients as $id => $entry)
                        <option value="{{ $id }}" @selected(old('client_id') ? old('client_id') == $id : $project->client->id == $id)>{{ $entry }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="team_id" :value="__('Assigned team')" />

                <select name="team_id" id="team_id" class="block mt-1 w-full">
                    @foreach ($teams as $id => $entry)
                        <option value="{{ $id }}" @selected(old('team_id') ? old('team_id') == $id : $project->team_id == $id)>{{ $entry }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('team_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="status" :value="__('Status')" />

                <select name="status" id="status" class="block mt-1 w-full">
                    @foreach (App\Enums\Project\Statuses::cases() as $status)
                        <option value="{{ $status->value }}" @selected(old('status') ? old('status') == $status->value : $project->status == $status->value)>{{ $status->name }}</option>
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

    <div class="mt-4 p-4 bg-white rounded-lg shadow-md">
        <div class="overflow-x-auto w-full">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                    <th class="px-4 py-3">File name</th>
                    <th class="px-4 py-3">Size</th>
                    <th class="px-4 py-3"></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y">
                    @forelse($project->getMedia() as $mediaItem)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $mediaItem->file_name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $mediaItem->human_readable_size }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <a class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked" href="{{ route('media.download', $mediaItem) }}">Download</a>

                                <form action="{{ route('media.destroy', $mediaItem) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="rounded-lg border border-transparent bg-purple-600 px-4 py-2 text-center text-sm font-medium leading-5 text-white transition-colors duration-150 hover:bg-purple-700 focus:outline-none focus:ring active:bg-purple-600 keychainify-checked">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
