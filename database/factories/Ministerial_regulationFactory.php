<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ministerial_regulation>
 */
class Ministerial_regulationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_peraturan' => fake()->bothify('???-###'),
            'tanggal_penetapan' => fake()->date(),
            'tentang' => fake()->paragraph(),
            'keterangan_status' => fake()->paragraph()
        ];
    }
}
