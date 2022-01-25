<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama barang' => $this->faker->words(2),
            'type barang' => $this->faker->words(1),
            'kondidi barang' => $this->faker->randomElements(['Baik','Rusak']),
            'status barang' => $this->faker->randomElements(['Tersedia','Tidak tersedia','Dalam perbaikan'])
        ];
    }
}
