<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterCta extends Model
{
    protected $fillable = [
        'university_id',
        'title',
        'subtitle',
        'description',
        'button_text',
        'button_url',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}