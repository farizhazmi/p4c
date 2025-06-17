<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Materi extends Model
{
    protected $fillable = ['judul', 'deskripsi', 'attachment', 'guru_id'];

    public function guru(): BelongsTo
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    public function soals(): HasMany
    {
        return $this->hasMany(Soal::class);
    }

    public function ujians(): HasMany
    {
        return $this->hasMany(Ujian::class);
    }
}