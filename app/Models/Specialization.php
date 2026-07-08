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

        'brochure',

        'is_featured',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean',
        'duration' => 'integer',
        'sort_order' => 'integer',
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