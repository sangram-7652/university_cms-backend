<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseFeeItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'courses_fee_id',
        'course_name',
        'duration',
        'total_fee',
        'sort_order',
    ];

    public function coursesFee()
    {
        return $this->belongsTo(CoursesFee::class);
    }
}