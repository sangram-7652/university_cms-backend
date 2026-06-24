<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
    protected $table = 'seo_meta';

    protected $fillable = [

        'meta_title',
        'meta_description',
        'meta_keywords',
    
        'canonical_url',

        'og_title',
        'og_description',
        'og_image',

        'twitter_title',
        'twitter_description',
        'twitter_image',

        'robots',

        'schema_override',
    ];

    protected $casts = [
        'schema_override' => 'array',
    ];

    public function seoable()
    {
        return $this->morphTo();
    }
}
