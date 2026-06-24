<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Course;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Faq\FaqResource;

class FaqController extends Controller
{
    public function courseFaqs(Course $course)
    {
        $faqs = $course->faqs()
            ->where('status', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Course FAQs fetched successfully',
            'data' => FaqResource::collection($faqs),
        ]);
    }


    public function specializationFaqs(Specialization $specialization)
    {
        $faqs = $specialization->faqs()
            ->where('status', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Specialization FAQs fetched successfully',
            'data' => FaqResource::collection($faqs),
        ]);
    }
}
