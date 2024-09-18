<?php

namespace Database\Seeders;

use App\Models\Etiquette;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Etiquette::factory()->count(10)->create();
    }
}
