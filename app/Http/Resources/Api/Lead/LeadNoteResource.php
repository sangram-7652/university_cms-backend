<?php

namespace App\Http\Resources\Api\Lead;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadNoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'note' => $this->note,

            'follow_up_at' => $this->follow_up_at,

            'user' => $this->whenLoaded('user', function () {
                return [

                    'id' => $this->user->id,

                    'name' => $this->user->name,

                ];
            }),

            'created_at' => $this->created_at,

        ];
    }
}
