<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudyMaterial extends Model
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

    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
}