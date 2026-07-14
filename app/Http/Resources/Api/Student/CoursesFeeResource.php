<?php

namespace App\Http\Resources\Api\Student;

use App\Http\Resources\Api\Seo\SeoMetaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoursesFeeResource extends JsonResource
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

            'title' => $this->title,

            'description' => $this->description,

            'footer_content' => $this->footer_content,

            'items' => CourseFeeItemResource::collection(
                $this->whenLoaded('items')
            ),

            'seo' => new SeoMetaResource(
                $this->whenLoaded('seo')
            ),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
