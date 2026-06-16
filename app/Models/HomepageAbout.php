<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageAbout extends Model
{
    protected $fillable = [
        'university_id',
        'title',
        'subtitle',
        'description',
        'image',
        'vision',
        'mission',
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
