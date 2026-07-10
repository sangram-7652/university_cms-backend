<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Student\LibraryPortalResource;
use App\Models\LibraryPortal;

class LibraryPortalController extends Controller
{
    public function index()
    {
        $libraryPortal = LibraryPortal::with('seo')
            ->where('university_id', university()->id)
            ->first();

        if (! $libraryPortal) {
            return response()->json([
                'success' => false,
                'message' => 'Library Portal not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new LibraryPortalResource($libraryPortal),
        ]);
    }
}