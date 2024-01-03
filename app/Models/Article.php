<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_artikel',
        'penulis',
        'seminar_konferensi_simposium',
        'penyelenggara_seminar_konferensi_simposium',
        'waktu_pelaksanaan_seminar_konferensi_simposium',
        'ISBN_ISSN',
        'user_id',
    ];
}
