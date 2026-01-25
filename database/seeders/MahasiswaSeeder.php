<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample Student 1
        Mahasiswa::create([
            'nim_mhs' => '2210114001',
            'kd_prodi' => 'TI',
            'nm_mhs' => 'Ahmad Santoso',
            'tempat_lhr_mhs' => 'Jakarta',
            'tgl_lhr_mhs' => '2002-05-15',
            'jenis_klmn_mhs' => 'L',
            'agama' => 'Islam',
            'alamat_mhs' => 'Jl. Merdeka No. 10, Jakarta Pusat',
            'tlp_mhs' => '081234567890',
            'kd_status_mhs' => 'Y', // Aktif
            'tgl_msk_mhs' => '2022-09-01',
        ]);

        // Sample Student 2
        Mahasiswa::create([
            'nim_mhs' => '2210114002',
            'kd_prodi' => 'SI',
            'nm_mhs' => 'Siti Aminah',
            'tempat_lhr_mhs' => 'Bandung',
            'tgl_lhr_mhs' => '2002-08-20',
            'jenis_klmn_mhs' => 'P',
            'agama' => 'Islam',
            'alamat_mhs' => 'Jl. Asia Afrika No. 55, Bandung',
            'tlp_mhs' => '081987654321',
            'kd_status_mhs' => 'Y', // Aktif
            'tgl_msk_mhs' => '2022-09-01',
        ]);

        // Sample Student 3
        Mahasiswa::create([
            'nim_mhs' => '2210114003',
            'kd_prodi' => 'DKV',
            'nm_mhs' => 'Budi Pratama',
            'tempat_lhr_mhs' => 'Surabaya',
            'tgl_lhr_mhs' => '2002-01-10',
            'jenis_klmn_mhs' => 'L',
            'agama' => 'Kristen',
            'alamat_mhs' => 'Jl. Darmo No. 12, Surabaya',
            'tlp_mhs' => '085678901234',
            'kd_status_mhs' => 'Y', // Aktif
            'tgl_msk_mhs' => '2022-09-01',
        ]);
    }
}
