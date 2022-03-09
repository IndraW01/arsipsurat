<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuratMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'unit_id' => $this->faker->numberBetween(1, 10),
            'no_suratmasuk' => $this->faker->unique()->bothify('#?#?#?'),
            'judul_suratmasuk' => $this->faker->sentence(mt_rand(2, 3)),
            'nama_pengirim' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'tanggal_masuk' => $this->faker->date(),
            'tanggal_diterima' => $this->faker->date(),
            'keterangan' => $this->faker->paragraph(mt_rand(2, 5)),
            'berkas' => 'Transkip terbaru.pdf'
        ];
    }
}
