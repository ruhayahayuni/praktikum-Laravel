<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lulusan extends Model
{
    use HasFactory;

    protected $table = 'lulusan';
    protected $fillable = [
        'nama',
        'prodi',
        'nilai',
        'gambar'
    ];
}