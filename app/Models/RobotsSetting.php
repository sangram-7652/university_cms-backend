<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RobotsSetting extends Model
{
    protected $fillable = [

        'enabled',
        'default_user_agent',

        'allow_paths',
        'disallow_paths',

        'include_sitemap',

        'custom_content',
    ];

    protected $casts = [

        'enabled' => 'boolean',

        'include_sitemap' => 'boolean',

        'allow_paths' => 'array',

        'disallow_paths' => 'array',
    ];
}
