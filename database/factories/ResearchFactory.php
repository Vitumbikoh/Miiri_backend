<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Research>
 */
class ResearchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // database/factories/ResearchFactory.php

public function definition(): array
{
    return [
        'title' => fake()->sentence,
        'description' => fake()->paragraph,
        'status' => fake()->randomElement(['Ongoing', 'Planning', 'Data Collection']),
        'collaborators' => [fake()->company, fake()->company],
    ];
}

}
