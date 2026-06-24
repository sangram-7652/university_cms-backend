<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\University\UniversityResource;
use App\Models\University;

class UniversityController extends Controller
{

    public function index()
    {

        $universities = University::where(

            'is_active',

            true

        )->get();


        return response()->json([

            'success' => true,

            'data' => UniversityResource::collection(

                $universities

            )

        ]);
    }


    public function show($slug)
    {

        $university = University::where(

            'slug',

            $slug

        )->firstOrFail();



        return response()->json([

            'success' => true,

            'data' => new UniversityResource(

                $university

            )

        ]);
    }
}
