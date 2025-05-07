<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DiseaseCriteria extends Model
{
    protected $fillable = [
        'criteria',
        'weight',
        'disease_id',
    ];

    public function penyakit(): BelongsTo
    {
        return $this->belongsTo(Disease::class);
    }

    public function evaluasi(): HasMany
    {
        return $this->hasMany(Evaluation::class);
    }
}
