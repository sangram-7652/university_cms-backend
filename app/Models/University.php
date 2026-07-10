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
use App\Models\FeeStructure;
use App\Models\Blog;
use App\Models\SeoMeta;
use App\Models\SeoSetting;
use App\Models\SchemaSetting;
use App\Models\SitemapSetting;
use App\Models\RobotsSetting;
use App\Models\HomepageProgram;
use App\Models\Admission;
use App\Models\CoursesFee;
use App\Models\HallTicket;
use App\Models\StudyMaterial;
use App\Models\Result;
use App\Models\LibraryPortal;



class University extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'short_name',
        'tagline',
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



    public function hero()
    {
        return $this->hasOne(HomePageHero::class);
    }

    public function about()
    {
        return $this->hasOne(HomepageAbout::class);
    }

    public function program()
    {
        return $this->hasOne(HomepageProgram::class);
    }

    public function eligibilities()
    {
        return $this->hasMany(HomepageEligibility::class);
    }

    public function whyChooseUs()
    {
        return $this->hasMany(HomepageWhyChooseUs::class);
    }

    public function faqs()
    {
        return $this->hasMany(HomepageFaq::class);
    }

    public function footerCta()
    {
        return $this->hasOne(FooterCta::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
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

    public function seoSetting()
    {
        return $this->hasOne(SeoSetting::class);
    }

    public function sitemapSetting()
    {
        return $this->hasOne(SitemapSetting::class);
    }

    public function robotsSetting()
    {
        return $this->hasOne(RobotsSetting::class);
    }

    public function schemaSettings()
    {
        return $this->hasMany(SchemaSetting::class);
    }

    public function admission()
    {
        return $this->hasOne(Admission::class);
    }

    public function coursesFee()
    {
        return $this->hasOne(CoursesFee::class);
    }

    public function hallTicket()
    {
        return $this->hasOne(HallTicket::class);
    }

    public function studyMaterials()
    {
        return $this->hasOne(StudyMaterial::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }

    public function libraryPortal()
    {
        return $this->hasOne(LibraryPortal::class);
    }

    public function assignmentStatus()
    {
        return $this->hasOne(AssignmentStatus::class);
    }

    public function alternativeUniversities()
    {
        return $this->hasMany(AlternativeUniversity::class);
    }
}
