<?php

namespace App\Http\Resources\Api\Student;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlternativeUniversityItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'university_name' => $this->university_name,
            'mode' => $this->mode,
            'naac_grade' => $this->naac_grade,
            'sort_order' => $this->sort_order,
        ];
    }
}
