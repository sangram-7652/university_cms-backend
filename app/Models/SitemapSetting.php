<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SitemapSetting extends Model
{
    protected $fillable = [

        'universities_enabled',
        'courses_enabled',
        'specializations_enabled',
        'blogs_enabled',

        'change_frequency',
        'priority',
    ];

    protected $casts = [

        'universities_enabled' => 'boolean',
        'courses_enabled' => 'boolean',
        'specializations_enabled' => 'boolean',
        'blogs_enabled' => 'boolean',

        'priority' => 'float',
    ];
}
