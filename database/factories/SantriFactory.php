<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Santri;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Santri>
 */
class SantriFactory extends Factory
{
    protected $model = Santri::class;

    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'nis' => $this->faker->randomNumber(5),
            'nisn' => $this->faker->randomNumber(8),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'tanggal_masuk' => $this->faker->date(),
            'tanggal_keluar' => $this->faker->date(),
            'alamat' => $this->faker->address(),
            'nama_wali' => $this->faker->name(),
            'no_hp_wali' => $this->faker->phoneNumber(),
            'gender' => $this->faker->randomElement(['putra', 'putri']),
            'status' => $this->faker->randomElement(['aktif', 'tidak aktif', 'pindah', 'alumni', 'drop out'])
        ];
    }
}
