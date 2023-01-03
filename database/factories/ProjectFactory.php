<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'description' => fake()->sentence(),
            'deadline' => fake()->date(),
            'client_id' => Client::pluck('id')->random(),
            'status' => 'open',
        ];
    }
}
