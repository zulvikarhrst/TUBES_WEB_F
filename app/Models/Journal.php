<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_artikel',
        'penulis',
        'nama_jurnal',
        'volume_jurnal',
        'nomor_jurnal',
        'halaman',
        'ISSN',
        'penerbit',
        'file_path',
        'user_id',
    ];
}
