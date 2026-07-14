<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Student\AlternativeUniversityResource;
use App\Models\AlternativeUniversity;

class AlternativeUniversityController extends Controller
{
    public function index()
    {
        $alternativeUniversity = AlternativeUniversity::with([
            'items',
            'seo',
        ])
            ->where('university_id', university()->id)
            ->first();

        if (! $alternativeUniversity) {
            return response()->json([
                'success' => false,
                'message' => 'Alternative Universities not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new AlternativeUniversityResource($alternativeUniversity),
        ]);
    }
}
