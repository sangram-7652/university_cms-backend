<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\SeoSetting;
use App\Models\SchemaTemplate;
use App\Models\SitemapSetting;
use App\Models\RobotsSetting;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Seo\SeoSettingResource;
use App\Http\Resources\Api\Seo\SchemaResource;
use App\Http\Resources\Api\Seo\SitemapResource;
use App\Http\Resources\Api\Seo\RobotsResource;

class SeoController extends Controller
{

    /**
     * Global SEO
     */
    public function global()
    {
        $seo = SeoSetting::first();

        return response()->json([
            'success' => true,
            'message' => 'SEO settings fetched successfully',
            'data' => new SeoSettingResource($seo),
        ]);
    }


    /**
     * Schema Templates
     */
    public function schema()
    {
        $schemas = SchemaTemplate::where(
            'is_active',
            true
        )->get();

        return response()->json([
            'success' => true,
            'message' => 'Schema templates fetched successfully',
            'data' => SchemaResource::collection($schemas),
        ]);
    }


    /**
     * Sitemap Settings
     */
    public function sitemap()
    {
        $sitemap = SitemapSetting::first();

        return response()->json([
            'success' => true,
            'message' => 'Sitemap settings fetched successfully',
            'data' => new SitemapResource($sitemap),
        ]);
    }


    /**
     * Robots Settings
     */
    public function robots()
    {
        $robots = RobotsSetting::first();

        return response()->json([
            'success' => true,
            'message' => 'Robots settings fetched successfully',
            'data' => new RobotsResource($robots),
        ]);
    }
}
