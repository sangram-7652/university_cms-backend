<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Curriculum\CurriculumResource;
use App\Models\Curriculum;

class CurriculumController extends Controller
{
    public function index()
    {

        $curricula = Curriculum::query()

            ->with([

                'course',

                'specialization'

            ])

            ->where(

                'university_id',

                university()->id

            )

            ->latest()

            ->paginate();



        return CurriculumResource::collection(

            $curricula

        );
    }


    public function show($slug)
    {

        $curriculum = Curriculum::query()

            ->with([

                'course',

                'specialization',

                'semesters.subjects'

            ])

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

            'data' => new CurriculumResource(

                $curriculum

            )

        ]);
    }
}
