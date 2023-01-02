<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Notifications\ProjectAssignedNotification;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view projects');

        $projects = Project::with('client', 'teams')->latest()->paginate();

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create projects');

        $teams = Team::pluck('name', 'id');
        $clients = Client::pluck('company_name', 'id');

        return view('projects.create', compact('teams', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $this->authorize('create projects');

        $project = Project::create($request->validated());
        
        if ($request->hasFile('upload')) {
            $project->addMedia($request->file('upload'))->toMediaCollection();
        }

        $project->teams()->sync($request->input('teams'));

        $project->teams->each(function ($team) use ($project) {
            $team->members->each(function ($member) use ($project) {
                $member->notify(new ProjectAssignedNotification($project));
            });
        });

        return to_route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $this->authorize('edit projects');

        $teams = Team::pluck('name', 'id');
        $clients = Client::pluck('company_name', 'id');

        return view('projects.edit', compact('project', 'teams', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('edit projects');

        $project->update($request->validated());

        if ($request->hasFile('upload')) {
            $project->addMedia($request->file('upload'))->toMediaCollection();
        }

        $project->teams()->sync($request->input('teams'));
        
        return to_route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('delete projects');

        $project->delete();
        
        return to_route('projects.index');
    }
}
