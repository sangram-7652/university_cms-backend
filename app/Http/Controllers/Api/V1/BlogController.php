<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Blog\BlogDetailResource;
use App\Http\Resources\Api\Seo\SeoMetaResource;
use App\Http\Resources\Api\Blog\BlogResource;
use App\Models\Blog;
use App\Models\SchemaSetting;
use App\Services\Schema\SchemaService;


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

            ->paginate(9);



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




    public function trending()
    {
        $blogs = Blog::query()
            ->where('university_id', university()->id)
            ->where('status', true)
            ->orderByDesc('views')
            ->latest('published_at')
            ->limit(3)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Trending blogs fetched successfully',
            'data' => BlogResource::collection($blogs),
        ]);
    }

    public function show($slug, SchemaService $schemaService)
    {
        $blog = Blog::with(['seo', 'university'])
            ->where('slug', $slug)
            ->where('university_id', university()->id)
            ->where('status', true)
            ->firstOrFail();

        $blog->increment('views');

        $schema = $schemaService->generate(
            SchemaSetting::PAGE_BLOG,
            $blog,
            $blog->seo?->schema_override
        );

        return response()->json([
            'success' => true,
            'message' => 'Blog fetched successfully',
            'data' => [

                'seo' => (new SeoMetaResource($blog->seo))->additional(['schema' => $schema]),

                'blog' => new BlogDetailResource($blog),

            ]
        ]);
    }
}
