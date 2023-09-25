<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review_internalreg>
 */
class Review_internalregFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'kppp' => fake()->bothify('???-###'),
            'kpde' => fake()->bothify('???-###'),
            'tentang_peraturan' => fake()->paragraph(),
            'keterangan_status' => fake()->paragraph(),
        ];
    }
}
