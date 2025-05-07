<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Disease extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the DiseaseCriteria for the blog post.
     */
    public function kriteria_penyakit(): HasMany
    {
        return $this->hasMany(DiseaseCriteria::class);
    }
}
