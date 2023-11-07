<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $table = 'peminjam';
    protected $fillable = [
        'tanggal_pinjam',
        'tanggal_kembali',
        'nama_peminjam',
        'judul_buku'
    ];
}
