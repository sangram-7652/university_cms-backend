<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Lead;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Lead\StoreLeadRequest;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request): JsonResponse
    {
        // Prevent duplicate submissions for the same phone on the same day
        $exists = Lead::where('phone', $request->phone)
            ->whereDate('created_at', today())
            ->exists();

        if ($exists) {

            return response()->json([

                'success' => false,

                'message' => 'Lead already submitted.'

            ], 422);
        }


        $lead = Lead::create([

            ...$request->validated(),

            'status' => 'new',

            'ip_address' => $request->ip(),

        ]);


        return response()->json([

            'success' => true,

            'message' => 'Lead submitted successfully.',

            'data' => [

                'id' => $lead->id,

                'name' => $lead->name,

                'phone' => $lead->phone,

                'status' => $lead->status,

                'created_at' => $lead->created_at,

            ]

        ], 201);
    }
}
