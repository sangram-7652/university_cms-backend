<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Curriculum\CurriculumResource;
use App\Models\Curriculum;


use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    public function index()
    {

        $curricula = Curriculum::query()

            ->with([
                'course',
                'specialization'
            ])

            ->latest()
            ->paginate();


        return CurriculumResource::collection(
            $curricula
        );
    }

    public function show($slug)
    {

        $curriculum = Curriculum::where('slug', $slug)

            ->with([
                'semesters.subjects'
            ])

            ->firstOrFail();



        return response()->json([

            'success' => true,

            'data' => new CurriculumResource(
                $curriculum
            )

        ]);
    }
}
