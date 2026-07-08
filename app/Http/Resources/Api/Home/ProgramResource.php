<?php

namespace App\Http\Resources\Api\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgramResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'heading' => $this->heading,
            'description' => $this->description,
        ];
    }
}