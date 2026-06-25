<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Semester\SemesterResource;
use App\Models\Curriculum;

class SemesterController extends Controller
{
    public function index($curriculum)
    {

        $curriculum = Curriculum::query()

            ->where(

                'id',

                $curriculum

            )

            ->where(

                'university_id',

                university()->id

            )

            ->firstOrFail();



        $semesters = $curriculum->semesters()

            ->where(

                'is_active',

                true

            )

            ->orderBy(

                'semester_no'

            )

            ->get();



        return response()->json([

            'success' => true,

            'message' => 'Semesters fetched successfully',

            'data' => SemesterResource::collection(

                $semesters

            )

        ]);
    }
}
