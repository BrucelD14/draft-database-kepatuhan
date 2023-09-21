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
            'nomor_peraturan' => fake()->bothify('???-###'),
            'tanggal_penetapan' => fake()->date(),
            'jenis_peraturan' => 'Undang-undang',
            'tentang' => fake()->paragraph(),
            'ringkasan' => fake()->paragraph(),
            'divisi' => 'Manajemen Risiko dan Hukum',
        ];
    }
}
