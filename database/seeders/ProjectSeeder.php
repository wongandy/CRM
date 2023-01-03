<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory(5)->create()->each(function ($project) {
            $teams = Team::all()->random(rand(1, 3));
            
            $project->teams()->sync($teams->pluck('id'));
        });
    }
}
