<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::create([
            'kd_prodi' => 'TI',
            'kd_jenis_prodi' => 'S1',
            'nm_prodi' => 'Teknik Informatika',
            'status_prodi' => 'A',
            'email_prodi' => 'ti@university.ac.id',
        ]);

        Prodi::create([
            'kd_prodi' => 'SI',
            'kd_jenis_prodi' => 'S1',
            'nm_prodi' => 'Sistem Informasi',
            'status_prodi' => 'A',
            'email_prodi' => 'si@university.ac.id',
        ]);

        Prodi::create([
            'kd_prodi' => 'DKV',
            'kd_jenis_prodi' => 'S1',
            'nm_prodi' => 'Desain Komunikasi Visual',
            'status_prodi' => 'B',
            'email_prodi' => 'dkv@university.ac.id',
        ]);
    }
}
