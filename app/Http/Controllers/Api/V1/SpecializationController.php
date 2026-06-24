<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Specialization\SpecializationResource;
use App\Models\Specialization;
use App\Models\Course;
use Illuminate\Http\Request;



class SpecializationController extends Controller
{
    public function index()
    {

        $specializations = Specialization::query()

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

        $specialization = Specialization::where(

            'slug',

            $slug

        )->firstOrFail();



        return response()->json([


            'success' => true,


            'data' => new SpecializationResource(

                $specialization
            )

        ]);
    }

    public function byCourse($slug)
    {
        $course = Course::where(
            'slug',
            $slug
        )->firstOrFail();


        return response()->json([

            'success' => true,

            'course' => $course->name,

            'data' => $course->specializations

        ]);
    }
}
