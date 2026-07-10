<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Seo\SeoMetaResource;
use App\Http\Resources\Api\Student\AdmissionResource;
use App\Models\Admission;

class AdmissionController extends Controller
{
    public function index()
    {

        $admission = Admission::with('seo')
            ->where('university_id', university()->id)
            ->where('is_active', true)
            ->firstOrFail();

        return response()->json([
            'success' => true,
            'message' => 'Admission fetched successfully',
            'data' => [
                'seo' => $admission->seo
                    ? new SeoMetaResource($admission->seo)
                    : null,
                'admission' => new AdmissionResource($admission),
            ],
        ]);
    }
}
