<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->sentence(),
            'descricao' => fake()->paragraph(),
            'finalizado' => fake()->boolean(),
            'data_limite' => fake()->dateTime()->format('Y-m-d H:i:s'),
        ];
    }
}
