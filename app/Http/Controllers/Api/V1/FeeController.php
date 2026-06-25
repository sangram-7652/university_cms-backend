<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Fee\FeeStructureResource;
use App\Models\Course;
use App\Models\FeeStructure;
use App\Models\Specialization;

class FeeController extends Controller
{
    public function index()
    {

        $fees = FeeStructure::query()

            ->where(

                'university_id',

                university()->id

            )

            ->latest()

            ->paginate(10);


        return response()->json([

            'success' => true,

            'data' => FeeStructureResource::collection(

                $fees

            )

        ]);
    }


    public function show($id)
    {

        $fee = FeeStructure::query()

            ->where(

                'id',

                $id

            )

            ->where(

                'university_id',

                university()->id

            )

            ->firstOrFail();



        return response()->json([

            'success' => true,

            'data' => new FeeStructureResource(

                $fee

            )

        ]);
    }


    public function byCourse($slug)
    {

        $course = Course::query()

            ->with('feeStructures')

            ->where(

                'slug',

                $slug

            )

            ->where(

                'university_id',

                university()->id

            )

            ->firstOrFail();



        return response()->json([

            'success' => true,

            'course' => $course->name,

            'fees' => FeeStructureResource::collection(

                $course->feeStructures

            )

        ]);
    }


    public function bySpecialization($slug)
    {

        $specialization = Specialization::query()

            ->with('feeStructures')

            ->where(

                'slug',

                $slug

            )

            ->where(

                'university_id',

                university()->id

            )

            ->firstOrFail();



        return response()->json([

            'success' => true,

            'specialization' => $specialization->name,

            'fees' => FeeStructureResource::collection(

                $specialization->feeStructures

            )

        ]);
    }
}
