<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageWhyChooseUs extends Model
{
    protected $fillable = [
        'university_id',
        'title',
        'subtitle',
        'description',
        'image',
        'points',
        'button_text',
        'button_url',
        'status',
    ];

    protected $casts = [
        'points' => 'array',
        'status' => 'boolean',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
