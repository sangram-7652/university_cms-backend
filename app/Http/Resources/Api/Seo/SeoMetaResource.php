<?php

namespace App\Http\Resources\Api\Seo;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeoMetaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'meta_title'          => $this->meta_title,
            'meta_description'    => $this->meta_description,
            'meta_keywords'       => $this->meta_keywords,
            'canonical_url'       => $this->canonical_url,
            'og_title'            => $this->og_title,
            'og_description'      => $this->og_description,
            'og_image'            => $this->og_image,
            'twitter_title'       => $this->twitter_title,
            'twitter_description' => $this->twitter_description,
            'twitter_image'       => $this->twitter_image,
            'robots'              => $this->robots,
            // Decode schema_override safely: prevents JsonEncodingException on malformed JSON
            'schema_override'     => $this->safeSchemaOverride(),
        ];
    }

    /**
     * Safely decode the schema_override JSON field.
     * Prevents JsonEncodingException when DB contains malformed JSON.
     */
    private function safeSchemaOverride(): ?array
    {
        $raw = $this->resource->getRawOriginal('schema_override');

        if ($raw === null || $raw === '') {
            return null;
        }

        $decoded = json_decode($raw, true);

        return is_array($decoded) ? $decoded : null;
    }
}
