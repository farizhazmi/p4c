<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Soal extends Model
{
    protected $fillable = ['materi_id', 'pertanyaan', 'pilihan', 'jawaban_benar', 'jenis'];

    protected $casts = [
        'pilihan' => 'array',
    ];

    public function materi(): BelongsTo
    {
        return $this->belongsTo(Materi::class);
    }
}