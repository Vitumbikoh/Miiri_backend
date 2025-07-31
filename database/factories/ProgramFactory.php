<?php

namespace Database\Factories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition()
    {
        $colors = ['must-green', 'must-blue', 'must-purple', 'must-orange'];

        return [
            'title' => $this->faker->unique()->sentence(3),
            'description' => $this->faker->paragraph,
            'features' => [
                $this->faker->sentence,
                $this->faker->sentence,
                $this->faker->sentence,
            ],
            'color' => $this->faker->randomElement($colors),
        ];
    }
}
