<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Specialization\SpecializationResource;
use App\Http\Resources\Api\Seo\SeoMetaResource;
use App\Models\Course;
use App\Models\Specialization;

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


    public function show($slug)
    {
        $university = university();

        $specialization = Specialization::with([
            'seo',
            'course',
        ])
            ->where('slug', $slug)
            ->whereHas('course', function ($query) use ($university) {
                $query->where('university_id', $university->id);
            })
            ->firstOrFail();

        return response()->json([

            'success' => true,
            'data' => [

                'seo' => new SeoMetaResource($specialization->seo),

                'course' => [
                    'id' => $specialization->course->id,
                    'name' => $specialization->course->name,
                    'slug' => $specialization->course->slug,
                ],

                'specialization' => new SpecializationResource($specialization),

            ]

        ]);
    }
}
