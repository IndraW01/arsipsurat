<?php

namespace Database\Seeders;

use App\Models\SuratMasuk;
use Illuminate\Database\Seeder;

class SuratMasukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return SuratMasuk::factory()->count(10)->create();
    }
}
