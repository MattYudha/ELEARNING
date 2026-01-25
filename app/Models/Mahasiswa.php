<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'm_mhs'; // Updated table name
    protected $primaryKey = 'nim_mhs';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim_mhs',
        'kd_prodi',
        'nm_mhs',
        'tempat_lhr_mhs',
        'agama',
        'tgl_lhr_mhs',
        'jenis_klmn_mhs',
        'tgl_msk_mhs',
        'kd_status_mhs',
        'alamat_mhs',
        'tlp_mhs',
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'kd_prodi', 'kd_prodi');
    }
}
