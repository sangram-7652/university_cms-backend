<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\BlogFaq\BlogFaqResource;

class BlogFaqController extends Controller
{

    public function index(Blog $blog)
    {

        $faqs = $blog->faqs()

            ->where('status', true)

            ->orderBy('sort_order')

            ->get();


        return response()->json([

            'success' => true,

            'message' => 'Blog FAQs fetched successfully',

            'data' => BlogFaqResource::collection($faqs)

        ]);
    }
}
