<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicTacToe>
 */
class TicTacToeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'x' => $this->faker->randomElement([0,1]),
            'room_id' => $this->faker->unique()->numberBetween(1,10)
        ];
    }
}
