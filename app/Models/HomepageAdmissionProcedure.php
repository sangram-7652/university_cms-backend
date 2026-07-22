<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageAdmissionProcedure extends Model
{
    protected $fillable = [
        'university_id',
        'title',
        'description',
        'procedure_steps',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'procedure_steps' => 'array',
        'is_active' => 'boolean',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
