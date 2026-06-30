<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchemaSetting extends Model
{
    /**
     * Page Types
     */
    public const PAGE_UNIVERSITY = 'university';
    public const PAGE_COURSE = 'course';
    public const PAGE_SPECIALIZATION = 'specialization';
    public const PAGE_BLOG = 'blog';

    /**
     * Mass Assignable
     */
    protected $fillable = [
        'university_id',
        'page_type',
        'is_active',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * University Relationship
     */
    public function university(): BelongsTo
    {
        return $this->belongsTo(University::class);
    }

    /**
     * Page Type Options
     */
    public static function pageTypes(): array
    {
        return [
            self::PAGE_UNIVERSITY => 'University',
            self::PAGE_COURSE => 'Course',
            self::PAGE_SPECIALIZATION => 'Specialization',
            self::PAGE_BLOG => 'Blog',
        ];
    }
}