<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'curriculum_id',
        'semester_no',
        'title',
        'description',
        'is_active',
    ];

    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
