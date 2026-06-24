<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Curriculum;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Semester\SemesterResource;

class SemesterController extends Controller
{
    public function index(Curriculum $curriculum)
    {
        $semesters = $curriculum->semesters()
            ->where('is_active', true)
            ->orderBy('semester_no')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Semesters fetched successfully',
            'data' => SemesterResource::collection($semesters),
        ]);
    }
}