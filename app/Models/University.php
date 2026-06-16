<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HomePageHero;
use App\Models\News;
use App\Models\HomepageAbout;
use App\Models\HomepageEligibility;
use App\Models\HomepageWhyChooseUs;
use App\Models\HomepageFaq;
use App\Models\FooterCta;
use App\Models\Course;

class University extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'subdomain',
        'logo',
        'favicon',
        'email',
        'phone',
        'address',
        'primary_color',
        'secondary_color',
        'accent_color',
        'font_family',
        'border_radius',
        'is_active'
    ];

    public function homepage()
    {
        return $this->hasMany(HomePageHero::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function about()
    {
        return $this->hasOne(HomepageAbout::class);
    }

    public function eligibility()
    {
        return $this->hasOne(HomepageEligibility::class);
    }

    public function whyChooseUs()
    {
        return $this->hasOne(HomepageWhyChooseUs::class);
    }

    public function faqs()
    {
        return $this->hasMany(HomepageFaq::class);
    }

    public function footerCta()
    {
        return $this->hasOne(FooterCta::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function feeStructures()
    {
        return $this->hasMany(FeeStructure::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }
}
