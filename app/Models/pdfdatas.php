<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdfdatas extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_path',  // Pastikan kolom ini ada
        'bukti', // Tambahkan bukti_path
        'kode',
        'note',
    ];
}
