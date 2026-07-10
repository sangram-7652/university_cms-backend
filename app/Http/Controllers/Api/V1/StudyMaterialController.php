<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Student\StudyMaterialResource;
use App\Models\StudyMaterial;

class StudyMaterialController extends Controller
{
    public function index()
    {
        $studyMaterial = StudyMaterial::with('seo')
            ->where('university_id', university()->id)
            ->first();

        if (! $studyMaterial) {
            return response()->json([
                'success' => false,
                'message' => 'Study Material not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new StudyMaterialResource($studyMaterial),
        ]);
    }
}