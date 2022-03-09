<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SuratKeluarFactory extends Factory
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
            'no_suratkeluar' => $this->faker->unique()->bothify('#?#?#?'),
            'judul_suratkeluar' => $this->faker->sentence(mt_rand(2, 3)),
            'nama_penerima' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'tujuan' => $this->faker->address(),
            'tanggal_keluar' => $this->faker->date(),
            'keterangan' => $this->faker->paragraph(mt_rand(2, 5)),
            'berkas' => 'Transkip terbaru.pdf'
        ];
    }
}
