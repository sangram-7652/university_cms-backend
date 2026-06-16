<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchemaTemplate extends Model
{
    protected $fillable = [

        'name',

        'schema_type',

        'description',

        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}