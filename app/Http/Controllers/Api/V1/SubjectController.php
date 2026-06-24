<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Subject\SubjectResource;
use App\Models\Semester;

class SubjectController extends Controller
{
    public function index(Semester $semester)
    {
        $subjects = $semester->subjects()
            ->where('is_active', true)
            ->orderBy('display_order')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Subjects fetched successfully',
            'data' => SubjectResource::collection($subjects)
        ]);
    }
}