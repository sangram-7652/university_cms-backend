<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BlogFaq\BlogFaqResource;
use App\Models\Blog;

class BlogFaqController extends Controller
{
    public function index($blog)
    {

        $blog = Blog::query()

            ->where(

                'id',

                $blog

            )

            ->where(

                'university_id',

                university()->id

            )

            ->firstOrFail();



        $faqs = $blog->faqs()

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

            'message' => 'Blog FAQs fetched successfully',

            'data' => BlogFaqResource::collection(

                $faqs

            )

        ]);
    }
}
