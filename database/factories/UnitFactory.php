<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UnitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kode_unit' => $this->faker->unique()->bothify('#?#?#?'),
            'nama_unit' => $this->faker->company(),
            'detail_unit' => $this->faker->sentence(mt_rand(2, 3))
        ];
    }
}
