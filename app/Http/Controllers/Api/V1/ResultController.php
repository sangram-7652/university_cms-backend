<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Student\ResultResource;
use App\Models\Result;

class ResultController extends Controller
{
    public function index()
    {
        $result = Result::with('seo')
            ->where('university_id', university()->id)
            ->first();

        if (! $result) {
            return response()->json([
                'success' => false,
                'message' => 'Result not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new ResultResource($result),
        ]);
    }
}
