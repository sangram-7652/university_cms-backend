<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'title',
        'description',
        'footer_content',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function items()
    {
        return $this->hasMany(CourseFeeItem::class)
            ->orderBy('sort_order');
    }

    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
}
