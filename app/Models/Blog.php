<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'university_id',
        'title',
        'slug',
        'short_description',
        'featured_image',
        'content',
        'author_name',
        'published_at',
        'status',
        'views',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'status' => 'boolean',
        ];
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function faqs()
    {
        return $this->hasMany(BlogFaq::class);
    }

    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
}
