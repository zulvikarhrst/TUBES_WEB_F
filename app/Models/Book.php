<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['judul_buku', 'ISBN', 'penerbit', 'jumlah_halaman', 'file_path', 'user_id'];

}
