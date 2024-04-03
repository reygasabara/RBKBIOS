<?php

namespace Database\Seeders;

use App\Models\Penerimaan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenerimaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penerimaan::factory(10)->create();
    }
}
