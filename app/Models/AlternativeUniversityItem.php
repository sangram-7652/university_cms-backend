<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlternativeUniversityItem extends Model
{
    protected $fillable = [
        'alternative_university_id',
        'university_name',
        'mode',
        'naac_grade',
        'sort_order',
    ];

    public function alternativeUniversity()
    {
        return $this->belongsTo(AlternativeUniversity::class);
    }
}