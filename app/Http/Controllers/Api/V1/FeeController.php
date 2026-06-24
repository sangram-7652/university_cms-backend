<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Fee\FeeStructureResource;
use App\Models\Course;
use App\Models\FeeStructure;
use App\Models\Specialization;
use Illuminate\Http\Request;



class FeeController extends Controller
{
    public function index()
    {

        $fees = FeeStructure::latest()
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

        $fee = FeeStructure::findOrFail($id);


        return response()->json([

            'success' => true,

            'data' => new FeeStructureResource(

                $fee

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


            'fees' => $course->feeStructures


        ]);
    }

    public function bySpecialization($slug)
    {


        $specialization = Specialization::where(

            'slug',

            $slug

        )->firstOrFail();



        return response()->json([


            'success' => true,


            'data' => $specialization->feeStructures


        ]);
    }
}
