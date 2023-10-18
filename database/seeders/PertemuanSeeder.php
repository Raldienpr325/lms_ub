<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pertemuan;

class PertemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 14; $i++) {
            Pertemuan::create([
                'pertemuan' => 'Pertemuan ' . $i,
                'judul' => 'Judul Pertemuan ' . $i,
                'deskripsi' => 'Deskripsi Pertemuan ' . $i,
                'status' => '1', // Atau status sesuai kebutuhan
            ]);
        }
    }
}
