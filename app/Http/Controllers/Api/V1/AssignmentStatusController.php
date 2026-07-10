<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Student\AssignmentStatusResource;
use App\Models\AssignmentStatus;

class AssignmentStatusController extends Controller
{
    public function index()
    {
        $assignmentStatus = AssignmentStatus::with('seo')
            ->where('university_id', university()->id)
            ->first();

        if (! $assignmentStatus) {
            return response()->json([
                'success' => false,
                'message' => 'Assignment Status not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new AssignmentStatusResource($assignmentStatus),
        ]);
    }
}
