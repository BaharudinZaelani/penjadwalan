<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruangan>
 */
class RuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "status" => $this->faker->boolean(),
            "nama" => "Ruangan ." . $this->faker->randomNumber(2, false),
            "kode_gedung" => $this->faker->randomDigitNotNull(),
            "kapasitas_belajar" => $this->faker->randomNumber(2, false),
            "kapasitas_ujian" => $this->faker->randomNumber(1, false),
            "keterangan" => $this->faker->paragraph()
        ];
    }
}
