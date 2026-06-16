<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'university_id',
        'name',
        'slug',
        'short_name',
        'duration',
        'duration_type',
        'course_level',
        'study_mode',
        'language',
        'short_description',
        'overview',
        'eligibility',
        'admission_process',
        'career_scope',
        'is_featured',
        'status',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function specializations()
    {
        return $this->hasMany(Specialization::class);
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
