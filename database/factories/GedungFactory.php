<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gedung>
 */
class GedungFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nama" => "Gedung " . $this->faker->randomNumber(2, true),
            "lantai" => $this->faker->randomNumber(2, true) . " L",
            "panjang" => $this->faker->randomNumber(3, true) . " M",
            "lebar" => $this->faker->randomNumber(3, true) . " M",
            "tinggi" => $this->faker->randomNumber(3, true) . " M",
            "keterangan" => $this->faker->paragraph()
        ];
    }
}
