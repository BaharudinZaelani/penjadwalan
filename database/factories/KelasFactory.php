<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "status" => $this->faker->randomNumber(1, false),
            "kode_jurusan" => $this->faker->randomDigitNotNull(),
            "nama" => $this->faker->randomNumber(5)
        ];
    }
}
