<?php

namespace App\Services\Schema;

use App\Models\Blog;
use App\Models\Course;
use App\Models\SchemaSetting;
use App\Models\Specialization;
use App\Models\University;
use InvalidArgumentException;

class SchemaService
{
    /**
     * Generate schema based on page type.
     * Returns null if schema is disabled for this university + page type.
     */
    public function generate(
        string $pageType,
        mixed $model,
    ): ?array {

        $setting = SchemaSetting::query()
            ->where('university_id', university()->id)
            ->where('page_type', $pageType)
            ->where('is_active', true)
            ->first();

        if (! $setting) {
            return null;
        }

        return match ($pageType) {

            SchemaSetting::PAGE_UNIVERSITY
                => $this->university($model),

            SchemaSetting::PAGE_COURSE
                => $this->course($model),

            SchemaSetting::PAGE_SPECIALIZATION
                => $this->specialization($model),

            SchemaSetting::PAGE_BLOG
                => $this->blog($model),

            default => throw new InvalidArgumentException(
                "Unsupported page type: {$pageType}"
            ),
        };
    }

    /**
     * Build CollegeOrUniversity JSON-LD from University model.
     */
    protected function university(University $university): array
    {
        $baseUrl = $this->baseUrl($university);

        $schema = [
            '@context'  => 'https://schema.org',
            '@type'     => 'CollegeOrUniversity',
            'name'      => $university->name,
            'url'       => $baseUrl,
            'logo'      => $university->logo
                            ? url($university->logo)
                            : null,
            'email'     => $university->email,
            'telephone' => $university->phone,
            'address'   => $university->address
                            ? [
                                '@type'         => 'PostalAddress',
                                'streetAddress' => $university->address,
                            ]
                            : null,
        ];

        return $this->clean($schema);
    }

    /**
     * Build Course JSON-LD from Course model.
     * Expects the 'university' relationship to be loaded on $course.
     */
    protected function course(Course $course): array
    {
        $university = $course->university;
        $baseUrl    = $university ? $this->baseUrl($university) : null;

        $schema = [
            '@context'         => 'https://schema.org',
            '@type'            => 'Course',
            'name'             => $course->name,
            'description'      => $course->short_description,
            'url'              => $baseUrl
                                    ? $baseUrl . '/courses/' . $course->slug
                                    : null,
            'provider'         => $university
                                    ? [
                                        '@type' => 'CollegeOrUniversity',
                                        'name'  => $university->name,
                                        'url'   => $baseUrl,
                                    ]
                                    : null,
            'educationalLevel' => $course->course_level,
            'inLanguage'       => $course->language,
            'timeRequired'     => $this->courseTimeRequired($course),
            'courseMode'       => $this->mapStudyMode($course->study_mode),
        ];

        return $this->clean($schema);
    }

    /**
     * Build Course JSON-LD from Specialization model.
     * Expects 'course' and 'course.university' to be loaded on $specialization.
     */
    protected function specialization(Specialization $specialization): array
    {
        $course     = $specialization->course;
        $university = $course?->university;
        $baseUrl    = $university ? $this->baseUrl($university) : null;

        $schema = [
            '@context'                     => 'https://schema.org',
            '@type'                        => 'Course',
            'name'                         => $specialization->name,
            'description'                  => $specialization->short_description,
            'url'                          => $baseUrl
                                                ? $baseUrl . '/specializations/' . $specialization->slug
                                                : null,
            'provider'                     => $university
                                                ? [
                                                    '@type' => 'CollegeOrUniversity',
                                                    'name'  => $university->name,
                                                    'url'   => $baseUrl,
                                                ]
                                                : null,
            'isPartOf'                     => $course
                                                ? [
                                                    '@type' => 'Course',
                                                    'name'  => $course->name,
                                                ]
                                                : null,
            'educationalCredentialAwarded' => $specialization->name,
        ];

        return $this->clean($schema);
    }

    /**
     * Build BlogPosting JSON-LD from Blog model.
     * Expects the 'university' relationship to be loaded on $blog.
     */
    protected function blog(Blog $blog): array
    {
        $university = $blog->university;
        $baseUrl    = $university ? $this->baseUrl($university) : null;

        $schema = [
            '@context'      => 'https://schema.org',
            '@type'         => 'BlogPosting',
            'headline'      => $blog->title,
            'description'   => $blog->short_description,
            'url'           => $baseUrl
                                ? $baseUrl . '/blogs/' . $blog->slug
                                : null,
            'image'         => $blog->featured_image
                                ? url($blog->featured_image)
                                : null,
            'author'        => [
                '@type' => 'Person',
                'name'  => $blog->author_name,
            ],
            'publisher'     => $university
                                ? [
                                    '@type' => 'Organization',
                                    'name'  => $university->name,
                                    'logo'  => $university->logo
                                                ? url($university->logo)
                                                : null,
                                ]
                                : null,
            'datePublished' => $blog->published_at?->toIso8601String(),
            'dateModified'  => $blog->updated_at?->toIso8601String(),
        ];

        return $this->clean($schema);
    }

    /**
     * Resolve the canonical base URL for a university.
     *
     * Priority:
     *   1. seo_settings.canonical_domain  (admin-configured production URL)
     *   2. config('app.url')              (fallback for local / unconfigured envs)
     */
    private function baseUrl(University $university): string
    {
        return rtrim(
            $university->seoSetting?->canonical_domain ?? config('app.url'),
            '/'
        );
    }

    /**
     * Format course duration as an ISO 8601 duration string.
     *
     * Examples:
     *   2 Years  → P2Y
     *   18 Months → P18M
     *   6 Weeks  → P6W
     */
    private function courseTimeRequired(Course $course): ?string
    {
        if (! $course->duration) {
            return null;
        }

        $suffixMap = [
            'Years'  => 'Y',
            'Months' => 'M',
            'Weeks'  => 'W',
        ];

        $suffix = $suffixMap[$course->duration_type] ?? 'Y';

        return 'P' . $course->duration . $suffix;
    }

    /**
     * Map internal study_mode enum values to schema.org courseMode values.
     *
     * Mapping:
     *   Online   → online
     *   Regular  → onsite
     *   Distance → distance learning
     *   Hybrid   → blended
     */
    private function mapStudyMode(?string $mode): ?string
    {
        if (! $mode) {
            return null;
        }

        return match ($mode) {
            'Online'   => 'online',
            'Regular'  => 'onsite',
            'Distance' => 'distance learning',
            'Hybrid'   => 'blended',
            default    => $mode,
        };
    }

    /**
     * Recursively remove null values from a schema array.
     *
     * Only null is removed. false, 0, and empty strings are preserved
     * because they may carry intentional meaning in JSON-LD.
     */
    private function clean(array $schema): array
    {
        foreach ($schema as $key => $value) {
            if (is_array($value)) {
                $schema[$key] = $this->clean($value);
            }
        }

        return array_filter(
            $schema,
            fn ($value) => $value !== null
        );
    }
}