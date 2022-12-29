<div>
    <div>
        <form wire:submit.prevent="updateTask" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">
                <x-input-label for="title" :value="__('Title')"/>
                <x-text-input type="text"
                            id="title"
                            name="title"
                            class="block w-full"
                            wire:model="task.title"
                            />
                <x-input-error :messages="$errors->get('task.title')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" wire:model="task.description"></x-textarea>
                <x-input-error :messages="$errors->get('task.description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="deadline" :value="__('Deadline')"/>
                <x-text-input type="date"
                            id="deadline"
                            name="deadline"
                            class="block w-full"
                            wire:model="task.deadline"
                            />
                <x-input-error :messages="$errors->get('task.deadline')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="project_id" :value="__('Assigned project')" />

                <select name="project_id" id="project_id" class="block mt-1 w-full" wire:model="task.project_id">
                    <option value="" disabled>-- SELECT PROJECT --</option>
                    @foreach ($projects as $id => $entry)
                        <option value="{{ $id }}">{{ $entry }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('task.project_id')" class="mt-2" />
            </div>

            @if (! empty($task->project_id))
                <div class="mt-4">
                    <x-input-label for="team_id" :value="__('Assigned team')" />

                    <select name="team_id" id="team_id" class="block mt-1 w-full" wire:model="task.team_id">
                        <option value="" disabled>-- SELECT TEAM --</option>
                        @foreach ($teams as $id => $entry)
                            <option value="{{ $id }}">{{ $entry }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('task.team_id')" class="mt-2" />
                </div>
            @endif

            @if (! empty($task->team_id))
                <div class="mt-4">
                    <x-input-label for="user_id" :value="__('Assigned member')" />

                    <select name="user_id" id="user_id" class="block mt-1 w-full" wire:model="task.user_id">
                        <option value="" disabled>-- SELECT MEMBER --</option>
                        @foreach ($members as $id => $entry)
                            <option value="{{ $id }}">{{ $entry }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('task.user_id')" class="mt-2" />
                </div>
            @endif

            <div class="mt-4">
                <x-input-label for="status" :value="__('Status')" />

                <select name="status" id="status" class="block mt-1 w-full" wire:model="task.status">
                    @foreach (App\Enums\Task\Statuses::options() as $label => $value)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('task.status')" class="mt-2" />
            </div>
                
            <div class="mt-4">
                <x-input-label for="upload" :value="__('File upload')"/>
                <x-text-input type="file"
                            id="upload"
                            name="upload"
                            class="block w-full"
                            wire:model="upload"
                            />
                            <div wire:loading wire:target="upload">Uploading...</div>
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
                    @forelse($this->task->getMedia() as $mediaItem)
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
</div>
