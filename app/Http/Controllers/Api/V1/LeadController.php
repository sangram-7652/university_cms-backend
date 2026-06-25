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
        $university = university();

        // Prevent duplicate submissions for same phone
        // on same university on same day

        $exists = Lead::query()

            ->where(

                'phone',

                $request->phone

            )

            ->where(

                'university_id',

                $university->id

            )

            ->whereDate(

                'created_at',

                today()

            )

            ->exists();



        if ($exists) {

            return response()->json([

                'success' => false,

                'message' => 'Lead already submitted.'

            ], 422);
        }



        $lead = Lead::create([

            ...$request->validated(),

            'university_id' => $university->id,

            'status' => 'new',

            'ip_address' => $request->ip(),

        ]);



        return response()->json([

            'success' => true,

            'message' => 'Lead submitted successfully.',

            'data' => [

                'id' => $lead->id,

                'name' => $lead->name,

                'email' => $lead->email,

                'phone' => $lead->phone,

                'status' => $lead->status,

                'created_at' => $lead->created_at,

            ]

        ], 201);
    }
}
