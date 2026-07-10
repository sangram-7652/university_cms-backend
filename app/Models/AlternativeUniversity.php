<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AlternativeUniversity extends Model
{
    protected $fillable = [
        'university_id',
        'title',
        'description',
        'content',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function items()
    {
        return $this->hasMany(AlternativeUniversityItem::class)
            ->orderBy('sort_order');
    }

    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
}
