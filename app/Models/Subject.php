<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'semester_id',
        'subject_code',
        'subject_name',
        'credits',
        'subject_type',
        'description',
        'display_order',
        'is_active',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
