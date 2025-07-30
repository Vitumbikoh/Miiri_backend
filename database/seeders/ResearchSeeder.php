<?php

namespace Database\Seeders;

use App\Models\Research;
use Illuminate\Database\Seeder;

class ResearchSeeder extends Seeder
{
    public function run()
    {
        Research::factory()->count(5)->create();
    }
}