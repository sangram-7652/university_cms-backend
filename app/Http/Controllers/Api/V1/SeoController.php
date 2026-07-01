<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Seo\RobotsResource;
use App\Http\Resources\Api\Seo\SitemapResource;
use App\Models\RobotsSetting;
use App\Models\SitemapSetting;

class SeoController extends Controller
{
    /**
     * Sitemap Settings
     */
    public function sitemap()
    {

        $sitemap = SitemapSetting::query()

            ->where(

                'university_id',

                university()->id

            )

            ->first();



        return response()->json([

            'success' => true,

            'message' => 'Sitemap settings fetched successfully',

            'data' => $sitemap

                ? new SitemapResource(

                    $sitemap

                )

                : null,

        ]);
    }




    /**
     * Robots Settings
     */
    public function robots()
    {

        $robots = RobotsSetting::query()

            ->where(

                'university_id',

                university()->id

            )

            ->first();



        return response()->json([

            'success' => true,

            'message' => 'Robots settings fetched successfully',

            'data' => $robots

                ? new RobotsResource(

                    $robots

                )

                : null,

        ]);
    }
}
