<?php

namespace App\Http\Resources\Api\Specialization;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SpecializationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [

            'id' => $this->id,

            'course_id' => $this->course_id,

            'name' => $this->name,

            'slug' => $this->slug,

            'code' => $this->code,

            'short_description' => $this->short_description,

            'overview' => $this->overview,

            'duration' => $this->duration,

            'duration_type' => $this->duration_type,

            'course_level' => $this->course_level,

            'study_mode' => $this->study_mode,

            'language' => $this->language,

            'eligibility' => $this->eligibility,

            'admission_process' => $this->admission_process,

            'career_scope' => $this->career_scope,

            'brochure' => $this->brochure
                ? asset(Storage::url($this->brochure))
                : null,

            'is_featured' => (bool) $this->is_featured,

            'status' => (bool) $this->status,

            'course' => [
                'id' => $this->course?->id,
                'name' => $this->course?->name,
                'slug' => $this->course?->slug,
                'university' => [
                    'id' => $this->course?->university?->id,
                    'name' => $this->course?->university?->name,
                    'slug' => $this->course?->university?->slug,
                ],
                'specializations' => SpecializationSummaryResource::collection(
                    $this->course?->specializations
                        ?->reject(fn ($sibling) => $sibling->id === $this->id)
                        ->values() ?? []
                ),
            ],

            'fee_structures' => $this->feeStructures->map(function ($fee) {

                return [

                    'id' => $fee->id,

                    'university_id' => $fee->university_id,

                    'course_id' => $fee->course_id,

                    'specialization_id' => $fee->specialization_id,

                    'is_active' => (bool) $fee->is_active,

                    'created_at' => $fee->created_at,

                    'updated_at' => $fee->updated_at,

                    'items' => $fee->items->map(function ($item) {

                        return [

                            'id' => $item->id,

                            'fee_structure_id' => $item->fee_structure_id,

                            'title' => $item->title,

                            'amount' => $item->amount,

                            'sort_order' => $item->sort_order,

                            'created_at' => $item->created_at,

                            'updated_at' => $item->updated_at,

                        ];
                    }),

                ];
            }),

            'curricula' => $this->curricula->map(function ($curriculum) {

                return [

                    'id' => $curriculum->id,

                    'university_id' => $curriculum->university_id,

                    'course_id' => $curriculum->course_id,

                    'specialization_id' => $curriculum->specialization_id,

                    'title' => $curriculum->title,

                    'curriculum_type' => $curriculum->curriculum_type,

                    'description' => $curriculum->description,

                    'is_active' => (bool) $curriculum->is_active,

                    'created_at' => $curriculum->created_at,

                    'updated_at' => $curriculum->updated_at,

                    'semesters' => $curriculum->semesters->map(function ($semester) {

                        return [

                            'id' => $semester->id,

                            'curriculum_id' => $semester->curriculum_id,

                            'semester_no' => $semester->semester_no,

                            'title' => $semester->title,

                            'description' => $semester->description,

                            'is_active' => (bool) $semester->is_active,

                            'created_at' => $semester->created_at,

                            'updated_at' => $semester->updated_at,

                            'subjects' => $semester->subjects,

                        ];
                    }),

                ];
            }),

            'faqs' => $this->faqs->map(function ($faq) {

                return [

                    'id' => $faq->id,

                    'course_id' => $faq->course_id,

                    'specialization_id' => $faq->specialization_id,

                    'question' => $faq->question,

                    'answer' => $faq->answer,

                    'sort_order' => $faq->sort_order,

                    'status' => (bool) $faq->status,

                    'created_at' => $faq->created_at,

                    'updated_at' => $faq->updated_at,

                ];
            }),

            'seo' => $this->whenLoaded('seo'),

            'created_at' => $this->created_at,

            'updated_at' => $this->updated_at,

        ];
    }
}