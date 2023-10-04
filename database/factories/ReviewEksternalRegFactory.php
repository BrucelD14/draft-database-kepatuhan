<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewEksternalReg>
 */
class ReviewEksternalRegFactory extends Factory
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
            'jenis_peraturan_eksternal_id' => mt_rand(1, 2),
            'nomor_peraturan' => fake()->bothify('???-###'),
            'tanggal_penetapan' => fake()->dateTimeBetween('-5 years', 'now'),
            'tentang' => fake()->paragraph(),
            'ringkasan' => fake()->paragraph(),
            'edisi' => fake()->date(),
        ];
    }
}
