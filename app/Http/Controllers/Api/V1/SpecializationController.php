<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Specialization\SpecializationResource;
use App\Models\Course;
use App\Models\Specialization;

class SpecializationController extends Controller
{
    public function index()
    {
        $university = university();

        $specializations = Specialization::query()

            ->where(
                'university_id',
                $university->id
            )

            ->latest()

            ->paginate(10);


        return response()->json([

            'success' => true,

            'data' => SpecializationResource::collection(

                $specializations

            )

        ]);
    }


    public function show($slug)
    {
        $university = university();


        $specialization = Specialization::query()

            ->where(

                'slug',

                $slug

            )

            ->where(

                'university_id',

                $university->id

            )

            ->firstOrFail();


        return response()->json([

            'success' => true,

            'data' => new SpecializationResource(

                $specialization

            )

        ]);
    }


    public function byCourse($slug)
    {
        $university = university();


        $course = Course::query()

            ->where(

                'slug',

                $slug

            )

            ->where(

                'university_id',

                $university->id

            )

            ->firstOrFail();


        $specializations = $course->specializations()

            ->where(

                'university_id',

                $university->id

            )

            ->latest()

            ->get();


        return response()->json([

            'success' => true,

            'course' => $course->name,

            'data' => SpecializationResource::collection(

                $specializations

            )

        ]);
    }
}
