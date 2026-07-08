<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomepageProgram extends Model
{
    protected $fillable = [
        'university_id',
        'heading',
        'description',
    ];

    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }
}