<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DosenSeeder::class,
            KurikulumSeeder::class,
            JurusanSeeder::class,
            MatakuliahSeeder::class,
            WaktuSeeder::class,
            SemesterSeeder::class,
            GedungSeeder::class,
            RuanganSeeder::class
        ]);
    }
}
