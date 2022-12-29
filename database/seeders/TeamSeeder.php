<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Team::factory(10)->create()->each(function ($team) {
            $members = User::all()->random(rand(5, 10));

            $team->members()->sync($members->pluck('id'));
        });
    }
}
