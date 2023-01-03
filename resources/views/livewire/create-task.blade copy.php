<div>
    <form wire:submit.prevent="storeTask" method="POST">
        @csrf

        <div class="mt-4">
            <x-input-label for="title" :value="__('Title')"/>
            <x-text-input type="text"
                        id="title"
                        name="title"
                        class="block w-full"
                        wire:model="title"
                        value="{{ $title }}"
                        />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />

            <x-textarea id="description" class="block mt-1 w-full" type="text" name="description" wire:model="description">{{ $description }}</x-textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="deadline" :value="__('Deadline')"/>
            <x-text-input type="date"
                        id="deadline"
                        name="deadline"
                        class="block w-full"
                        wire:model="deadline"
                        value="{{ $deadline }}"
                        />
            <x-input-error :messages="$errors->get('deadline')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="project_id" :value="__('Assigned project')" />

            <select name="project_id" id="project_id" class="block mt-1 w-full" wire:model="assignedProject">
                <option value="" disabled>-- SELECT PROJECT --</option>
                @foreach ($projects as $id => $entry)
                    <option value="{{ $id }}">{{ $entry }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('assignedProject')" class="mt-2" />
        </div>

        @if (! empty($assignedProject))
            <div class="mt-4">
                <x-input-label for="team_id" :value="__('Assigned team')" />

                <select name="team_id" id="team_id" class="block mt-1 w-full" wire:model="assignedTeam">
                    <option value="" disabled>-- SELECT TEAM --</option>
                    @foreach ($teams as $id => $entry)
                        <option value="{{ $id }}">{{ $entry }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('assignedTeam')" class="mt-2" />
            </div>
        @endif

        @if (! empty($assignedTeam))
            <div class="mt-4">
                <x-input-label for="member_id" :value="__('Assigned member')" />

                <select name="member_id" id="member_id" class="block mt-1 w-full" wire:model="assignedMember">
                    <option value="" disabled>-- SELECT MEMBER --</option>
                    @foreach ($members as $id => $entry)
                        <option value="{{ $id }}">{{ $entry }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('assignedMember')" class="mt-2" />
            </div>
        @endif

        <div class="mt-4">
            <x-input-label for="status" :value="__('Status')" />

            <select name="status" id="status" class="block mt-1 w-full" wire:model="status">
                @foreach (App\Enums\Task\Statuses::options() as $label => $value)
                    <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-primary-button>
                {{ __('Save') }}
            </x-primary-button>
        </div>
    </form>
</div>
