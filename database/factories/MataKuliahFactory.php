<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MataKuliah>
 */
class MataKuliahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nama_id" => $this->faker->name(),
            "nama_en" => $this->faker->name(),
            "jurusan_id" => rand(0, 5),
            "kode_kurikulum" => 1,
            "status" => $this->faker->boolean()
        ];
    }
}
