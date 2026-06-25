<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Faq\FaqResource;
use App\Models\Course;
use App\Models\Specialization;

class FaqController extends Controller
{
    public function courseFaqs($course)
    {

        $course = Course::query()

            ->where(

                'id',

                $course

            )

            ->where(

                'university_id',

                university()->id

            )

            ->firstOrFail();



        $faqs = $course->faqs()

            ->where(

                'status',

                true

            )

            ->orderBy(

                'sort_order'

            )

            ->get();



        return response()->json([

            'success' => true,

            'message' => 'Course FAQs fetched successfully',

            'data' => FaqResource::collection(

                $faqs

            )

        ]);
    }



    public function specializationFaqs($specialization)
    {

        $specialization = Specialization::query()

            ->where(

                'id',

                $specialization

            )

            ->where(

                'university_id',

                university()->id

            )

            ->firstOrFail();



        $faqs = $specialization->faqs()

            ->where(

                'status',

                true

            )

            ->orderBy(

                'sort_order'

            )

            ->get();



        return response()->json([

            'success' => true,

            'message' => 'Specialization FAQs fetched successfully',

            'data' => FaqResource::collection(

                $faqs

            )

        ]);
    }
}
