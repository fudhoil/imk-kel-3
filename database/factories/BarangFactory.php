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
            'nama_barang' => $this->faker->words(2),
            'type_barang' => $this->faker->words(1),
            'kondidi_barang' => $this->faker->randomElements(['Baik','Rusak']),
            'status_barang' => $this->faker->randomElements(['Tersedia','Tidak tersedia','Dalam perbaikan']),
        ];
    }
}
