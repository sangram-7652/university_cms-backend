<?php

namespace App\Http\Resources\Api\Lead;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'state' => $this->state,

            'source' => $this->source,
            'page_url' => $this->page_url,
            'ip_address' => $this->ip_address,

            'status' => $this->status,
            'remarks' => $this->remarks,

            'university' => $this->whenLoaded('university', function () {
                return [
                    'id' => $this->university->id,
                    'name' => $this->university->name,
                ];
            }),

            'course' => $this->whenLoaded('course', function () {
                return [
                    'id' => $this->course->id,
                    'title' => $this->course->title,
                ];
            }),

            'specialization' => $this->whenLoaded('specialization', function () {
                return [
                    'id' => $this->specialization->id,
                    'name' => $this->specialization->name,
                ];
            }),

            'assigned_to' => $this->whenLoaded('assignedUser', function () {
                return [
                    'id' => $this->assignedUser->id,
                    'name' => $this->assignedUser->name,
                ];
            }),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
