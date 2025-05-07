<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evaluation extends Model
{
    protected $fillable = [
        'patient_id',
        'disease_criterias_id',
        'value',
    ];

    public function disease_criterias(): BelongsTo
    {
        return $this->belongsTo(DiseaseCriteria::class);
    }

    public function patients(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
