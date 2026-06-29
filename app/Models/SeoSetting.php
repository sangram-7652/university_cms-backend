<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'university_id',

        'site_name',

        'default_title',
        'default_description',
        'default_keywords',

        'default_og_image',

        'canonical_domain',

        'google_analytics_id',
        'google_tag_manager_id',

        'facebook_pixel_id',

        'twitter_handle',

        'google_verification',
        'bing_verification',

        'contact_email',
        'contact_phone',

        'enable_schema',
        'enable_sitemap',
        'enable_robots',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
