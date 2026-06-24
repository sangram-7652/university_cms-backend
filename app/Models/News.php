<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [

        'university_id',

        'title',

        'slug',

        'excerpt',

        'content',

        'pdf_file',

        'publish_date',

        'features_image',

        'status',

    ];


    protected $casts = [

        'publish_date' => 'date',

        'status' => 'boolean'

    ];


    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
