<div>
    <form wire:submit.prevent="storeTask" method="POST">
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
