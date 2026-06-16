<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageEligibility extends Model
{
    protected $fillable = [
        'university_id',
        'title',
        'subtitle',
        'description',
        'certificate_image',
        'button_text',
        'button_url',
        'status',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
