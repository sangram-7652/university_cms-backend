<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchemaTemplate extends Model
{
    protected $fillable = [
        'university_id',

        'name',

        'schema_type',

        'description',

        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }
}
