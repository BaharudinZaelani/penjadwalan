<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jurusan>
 */
class JurusanFactory extends Factory
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
            "nama_idn" => "Sistem Informasi " . $this->faker->randomNumber(2, false),
            "nama_en" => "Information System " . $this->faker->randomNumber(2, false),
            "bidang_keahlian" => "Lorem Ipsum " . time(),
            "kompetensi_umum" => "Lorem ipsum " . time(),
            "kompetensi_khusus" => "Lorem ipsum " . time(),
            "pejabat" => $this->faker->randomDigitNotNull(),
            "jabatan" => "Lorem ipsum " . time(),
            "keterangan" => $this->faker->paragraph()
        ];
    }
}
