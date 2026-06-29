<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Course\CourseResource;
use App\Http\Resources\Api\Seo\SeoMetaResource;
use App\Models\Course;
use Illuminate\Http\Request;

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

            ->paginate(10);



        return response()->json([

            'success' => true,


            'data' => CourseResource::collection(

                $courses

            )

        ]);
    }

    public function show($slug)
    {

        $course = Course::with('seo')
            ->where('slug', $slug)
            ->where('university_id', university()->id)
            ->firstOrFail();


        return response()->json([

            'success' => true,

            'data' => [

                'seo' => new SeoMetaResource($course->seo),

                'course' => new CourseResource($course),

            ]

        ]);
    }
}
