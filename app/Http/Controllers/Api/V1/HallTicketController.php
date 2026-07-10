<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Student\HallTicketResource;
use App\Models\HallTicket;

class HallTicketController extends Controller
{
    public function index()
    {
        $university = university();

        $hallTicket = HallTicket::query()
            ->with('seo')
            ->where('university_id', $university->id)
            ->first();

        if (! $hallTicket) {
            return response()->json([
                'success' => false,
                'message' => 'Hall Ticket not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => new HallTicketResource($hallTicket),
        ]);
    }
}
