<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePageHero extends Model
{
    protected $table = 'homepage_heroes';
    protected $fillable = [
        'university_id',
        'badge_text',
        'title',
        'description',
        'primary_button_text',
        'primary_button_url',
        'secondary_button_text',
        'secondary_button_url',
        'video_url',
        'hero_image',
        'podcast_audio',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
