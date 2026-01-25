<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'm_prodi';
    protected $primaryKey = 'kd_prodi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kd_prodi',
        'kd_jenis_prodi',
        'nm_prodi',
        'status_prodi',
        'email_prodi',
    ];
}
