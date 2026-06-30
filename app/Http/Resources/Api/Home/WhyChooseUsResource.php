<?php

namespace App\Http\Resources\Api\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WhyChooseUsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'subtitle'    => $this->subtitle,
            'description' => $this->description,
            'image'       => $this->image,
            // Decode points safely: if malformed JSON, return empty array instead of crashing
            'points'      => $this->safePoints(),
            'button_text' => $this->button_text,
            'button_url'  => $this->button_url,
            'status'      => $this->status,
        ];
    }

    /**
     * Safely decode the points JSON field.
     * Prevents JsonEncodingException when DB contains malformed JSON.
     */
    private function safePoints(): array
    {
        $raw = $this->resource->getRawOriginal('points');

        if ($raw === null || $raw === '') {
            return [];
        }

        $decoded = json_decode($raw, true);

        return is_array($decoded) ? $decoded : [];
    }
}
