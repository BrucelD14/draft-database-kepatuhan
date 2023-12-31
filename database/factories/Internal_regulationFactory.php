<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Internal_regulation>
 */
class Internal_regulationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jenis_peraturan_internal_id' => mt_rand(1, 2),
            'nomor_peraturan' => fake()->bothify('???-###'),
            'tanggal_penetapan' => fake()->dateTimeBetween('-5 years', 'now'),
            'tentang' => fake()->paragraph(),
            'keterangan_status' => fake()->paragraph()
        ];
    }
}
