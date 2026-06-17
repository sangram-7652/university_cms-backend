<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [

        'name',
        'email',
        'phone',
        'state',

        'university_id',
        'course_id',
        'specialization_id',

        'assigned_to',

        'source',
        'page_url',
        'ip_address',

        'status',
        'remarks'

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


    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }


    public function notes()
    {
        return $this->hasMany(LeadNote::class);
    }
}
