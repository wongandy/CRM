<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\Team;
use App\Models\Project;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditTask extends Component
{
    use WithFileUploads;
    
    public Task $task;
    public $teams;
    public $members;
    public $projects;
    public $upload;

    protected $rules = [
        'task.title' => ['required', 'string', 'max:255'],
        'task.description' => ['required', 'string'],
        'task.deadline' => ['required', 'date'],
        'task.status' => ['required'],
        'task.project_id' => ['required'],
        'task.team_id' => ['required_with:task.project_id'],
        'task.user_id' => ['required_with:task.team_id'],
        'task.created_by' => ['required'],
        'upload' => ['nullable'],
    ];

    protected $messages = [
        'task.team_id.required_with' => 'The assigned team field is required.',
        'task.user_id.required_with' => 'The assigned member field is required.',
    ];

    public function mount(Task $task)
    {
        $this->teams = collect();
        $this->members = collect();
        $this->projects = Project::pluck('title', 'id');
        $this->task->status = 'open';
        $this->updatedTaskProjectId($this->task->project_id, false);
        $this->task->team_id = $task->team_id;
        $this->updatedTaskTeamId($this->task->team_id, false);
        $this->task->member_id = $task->user_id;
    }

    public function render()
    {
        return view('livewire.edit-task');
    }

    public function updateTask()
    {
        $this->validate();

        $this->task->save();
        
        if ($this->upload) {
            $this->task->addMedia($this->upload)->toMediaCollection();
        }

        return to_route('tasks.index');
    }


    public function updatedTaskProjectId($id, $resetFields = true)
    {
        $this->teams = Project::find($id)->teams->pluck('name', 'id');

        if ($resetFields) {
            $this->task->team_id = '';
            $this->task->user_id = '';
        }
    }

    public function updatedTaskTeamId($id, $resetFields = true)
    {
        $this->members = Team::find($id)->members->pluck('name', 'id');

        if ($resetFields) {
            $this->task->user_id = '';
        }
    }
}
