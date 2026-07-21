<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Course\CourseResource;
use App\Http\Resources\Api\Seo\SeoMetaResource;
use App\Models\Course;
use App\Models\SchemaSetting;
use App\Services\Schema\SchemaService;
use Illuminate\Http\Request;
use App\Http\Resources\Api\Specialization\SpecializationResource;

class CourseController extends Controller
{
    public function index(Request $request)
    {

        $university = university();

        $query = Course::query()

            ->where(

                'university_id',

                university()->id

            );



        if ($request->filled('level')) {

            $query->where(

                'course_level',

                $request->level

            );
        }



        if ($request->filled('study_mode')) {

            $query->where(

                'study_mode',

                $request->study_mode

            );
        }



        $courses = $query

            ->latest()

            ->get();



        return response()->json([

            'success' => true,


            'data' => CourseResource::collection(

                $courses

            )

        ]);
    }

    public function show($slug, SchemaService $schemaService)
    {

        $course = Course::with([
            'seo',
            'university.seoSetting',
            'specializations',
            'feeStructures.items',
            'curricula.semesters.subjects',
            'faqs',
        ])
            ->where('slug', $slug)
            ->where('university_id', university()->id)
            ->firstOrFail();

        $schema = $schemaService->generate(
            SchemaSetting::PAGE_COURSE,
            $course,
            $course->seo?->schema_override
        );

        $seo = null;

        if ($course->seo) {
            $seo = (new SeoMetaResource($course->seo))->resolve(request());
            $seo['schema'] = $schema;
        }

        return response()->json([

            'success' => true,

            'data' => [

                'seo' => $seo,

                'course' => new CourseResource($course),


            ]

        ]);
    }
}
