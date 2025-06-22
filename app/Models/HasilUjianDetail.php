<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilUjianDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'hasil_ujian_id', 
        'pertanyaan', 
        'jawaban',
        'nilai',
        'alasan'
    ];
}
