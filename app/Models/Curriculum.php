<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = [
        'university_id',
        'course_id',
        'specialization_id',
        'title',
        'curriculum_type',
        'description',
        'is_active',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function semesters()
    {
        return $this->hasMany(Semester::class);
    }
}
