<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengeluaran>
 */
class PengeluaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tgl_transaksi' => Carbon::yesterday(),
            'kd_akun' => fake()->numberBetween(525121, 525129),
            'jumlah' =>  floor(fake()->numberBetween(1000, 20000000) / 1000) * 1000,
        ];
    }
}
