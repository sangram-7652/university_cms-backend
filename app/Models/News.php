<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'university_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'publish_date',
        'featured_image',
        'status',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}