<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'm_dosen';
    protected $primaryKey = 'kd_dosen';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kd_dosen',
        'nm_dosen',
        'nidn_dosen',
        'jns_klmn_dosen',
        'kd_jabatan_dosen',
        'status_dosen',
    ];
}
