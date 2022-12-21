<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'contact_name' => fake()->name(),
            'contact_email' => fake()->safeEmail(),
            'contact_phone_number' => fake()->phoneNumber(),
            'company_name' => fake()->name(),
            'company_vat' => fake()->buildingNumber(),
            'company_address' => fake()->address(),
            'company_city' => fake()->city(),
            'company_zip' => fake()->buildingNumber(),
        ];
    }
}
