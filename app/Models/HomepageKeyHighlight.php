<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageKeyHighlight extends Model
{
    protected $fillable = [
        'university_id',
        'title',
        'description',
        'icon',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
