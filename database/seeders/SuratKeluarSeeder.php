<?php

namespace Database\Seeders;

use App\Models\SuratKeluar;
use Illuminate\Database\Seeder;

class SuratKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return SuratKeluar::factory()->count(10)->create();
    }
}
