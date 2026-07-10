<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Student\CoursesFeeResource;
use App\Models\CoursesFee;

class CoursesFeeController extends Controller
{
    public function index()
    {
        $university = university();

        $coursesFee = CoursesFee::query()
            ->with([
                'items',
                'seo',
            ])
            ->where('university_id', $university->id)
            ->first();

        if (! $coursesFee) {
            return response()->json([
                'success' => false,
                'message' => 'Courses & Fees not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new CoursesFeeResource($coursesFee),
        ]);
    }
}