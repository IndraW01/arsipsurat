<?php

namespace Database\Seeders;

use App\Models\SuratMasuk;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UnitSeeder::class,
            SuratMasukSeeder::class,
            SuratKeluarSeeder::class
        ]);
    }
}
