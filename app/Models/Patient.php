<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'date_birth',
        'address',
        'phone',
    ];

    public function evaluasi(): HasMany
    {
        return $this->hasMany(Evaluation::class);
    }
}
