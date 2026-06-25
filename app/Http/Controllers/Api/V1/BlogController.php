<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Blog\BlogDetailResource;
use App\Http\Resources\Api\Blog\BlogResource;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {

        $blogs = Blog::query()

            ->where(

                'university_id',

                university()->id

            )

            ->where(

                'status',

                true

            )

            ->latest(

                'published_at'

            )

            ->paginate(10);



        return response()->json([

            'success' => true,

            'message' => 'Blogs fetched successfully',

            'data' => BlogResource::collection(

                $blogs

            ),

            'pagination' => [

                'current_page' => $blogs->currentPage(),

                'last_page' => $blogs->lastPage(),

                'per_page' => $blogs->perPage(),

                'total' => $blogs->total(),

            ]

        ]);

    }




    public function show($slug)
    {


        $blog = Blog::query()

            ->where(

                'slug',

                $slug

            )

            ->where(

                'university_id',

                university()->id

            )

            ->where(

                'status',

                true

            )

            ->firstOrFail();



        $blog->increment(

            'views'

        );



        return response()->json([

            'success' => true,

            'message' => 'Blog fetched successfully',

            'data' => new BlogDetailResource(

                $blog

            )

        ]);

    }
}