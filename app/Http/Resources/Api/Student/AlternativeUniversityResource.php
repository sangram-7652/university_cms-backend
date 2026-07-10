<?php

namespace App\Http\Resources\Api\Student;

use App\Http\Resources\Api\Seo\SeoMetaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlternativeUniversityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,

            'description' => $this->description,

            'items' => AlternativeUniversityItemResource::collection(
                $this->whenLoaded('items')
            ),

            'content' => $this->content,

            'seo' => new SeoMetaResource(
                $this->whenLoaded('seoMeta')
            ),
        ];
    }
}
