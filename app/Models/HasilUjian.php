<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilUjian extends Model
{
    use HasFactory;

    protected $fillable = [
        'ujian_id', 
        'user_id', 
        'materi_id',
        'total_nilai'
    ];
}
