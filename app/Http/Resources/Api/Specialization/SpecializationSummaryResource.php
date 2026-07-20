<?php

namespace App\Http\Resources\Api\Specialization;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecializationSummaryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'name' => $this->name,

            'slug' => $this->slug,

            'short_description' => $this->short_description,

            'duration' => $this->duration,

            'duration_type' => $this->duration_type,

            'course_level' => $this->course_level,

        ];
    }
}
