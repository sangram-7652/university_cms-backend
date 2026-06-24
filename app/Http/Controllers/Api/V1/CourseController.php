<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Course\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {

        $query = Course::query();


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


        if ($request->filled('university')) {
            $query->where(
                'university_id',
                $request->university
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


        $course = Course::where(

            'slug',

            $slug

        )->firstOrFail();



        return response()->json([


            'success' => true,


            'data' => new CourseResource(

                $course
            )

        ]);
    }
}
