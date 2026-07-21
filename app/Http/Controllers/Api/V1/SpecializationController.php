<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Specialization\SpecializationResource;
use App\Http\Resources\Api\Seo\SeoMetaResource;
use App\Models\Course;
use App\Models\SchemaSetting;
use App\Models\Specialization;
use App\Services\Schema\SchemaService;

class SpecializationController extends Controller
{
    public function index()
    {
        $university = university();

        $specializations = Specialization::with('course')
            ->whereHas('course', function ($query) use ($university) {
                $query->where('university_id', $university->id);
            })
            ->latest()
            ->paginate(10);


        return response()->json([

            'success' => true,

            'data' => SpecializationResource::collection(

                $specializations

            )

        ]);
    }


    public function show($slug, SchemaService $schemaService)
    {
        $university = university();

        $specialization = Specialization::with([
            'seo',
            'course.university.seoSetting',
            'course.specializations' => function ($query) {
                $query->where('status', true)
                    ->orderBy('sort_order')
                    ->select([
                        'id',
                        'course_id',
                        'name',
                        'slug',
                        'short_description',
                        'duration',
                        'duration_type',
                        'course_level',
                        'sort_order',
                    ]);
            },
            'feeStructures.items',
            'curricula.semesters.subjects',
            'faqs',
        ])
            ->where('slug', $slug)
            ->whereHas('course', function ($query) use ($university) {
                $query->where('university_id', $university->id);
            })
            ->firstOrFail();

        $schema = $schemaService->generate(
            SchemaSetting::PAGE_SPECIALIZATION,
            $specialization,
            $specialization->seo?->schema_override
        );

        return response()->json([

            'success' => true,
            'data' => [

                'seo' => (new SeoMetaResource($specialization->seo))->additional(['schema' => $schema]),

                'course' => [
                    'id' => $specialization->course->id,
                    'name' => $specialization->course->name,
                    'slug' => $specialization->course->slug,
                ],

                'specialization' => new SpecializationResource($specialization),

            ]

        ]);



    }

    public function byCourse($slug)
{
    $university = university();

    $course = Course::where('slug', $slug)
        ->where('university_id', $university->id)
        ->firstOrFail();

    $specializations = Specialization::with([
        'course.university',
        'feeStructures.items',
        'curricula.semesters.subjects',
        'faqs',
    ])
        ->where('course_id', $course->id)
        ->latest()
        ->get();

    return response()->json([
        'success' => true,
        'data' => [
            'course' => [
                'id' => $course->id,
                'name' => $course->name,
                'slug' => $course->slug,
            ],
            'specializations' => SpecializationResource::collection($specializations),
        ],
    ]);
}
}
