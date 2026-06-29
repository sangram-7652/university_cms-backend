<?php

namespace App\Http\Resources\Api\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Api\Specialization\SpecializationResource;


class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'name' => $this->name,
            'slug' => $this->slug,
            'short_name' => $this->short_name,

            'university' => $this->whenLoaded('university', function () {
                return [
                    'name' => $this->university->name,
                ];
            }),

            'duration' => $this->duration,
            'duration_type' => $this->duration_type,
            'course_level' => $this->course_level,
            'study_mode' => $this->study_mode,
            'language' => $this->language,

            'short_description' => $this->short_description,
            'overview' => $this->overview,
            'eligibility' => $this->eligibility,
            'admission_process' => $this->admission_process,
            'career_scope' => $this->career_scope,

            'is_featured' => (bool) $this->is_featured,

            'specializations' => SpecializationResource::collection(
                $this->whenLoaded('specializations')
            ),

        ];
    }
}
