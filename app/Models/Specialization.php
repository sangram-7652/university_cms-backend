<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'slug',
        'code',
        'short_description',
        'description',
        'duration',
        'eligibility',
        'brochure',
        'is_featured',
        'is_active',
        'sort_order',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function feeStructures()
    {
        return $this->hasMany(FeeStructure::class);
    }

    public function curricula()
    {
        return $this->hasMany(Curriculum::class);
    }

    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
}
