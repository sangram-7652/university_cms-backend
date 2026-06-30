<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Home\HeroResource;
use App\Http\Resources\Api\Home\AboutResource;
use App\Http\Resources\Api\Home\EligibilityResource;
use App\Http\Resources\Api\Home\WhyChooseUsResource;
use App\Http\Resources\Api\Home\FaqResource;
use App\Http\Resources\Api\Home\FooterCtaResource;
use App\Http\Resources\Api\Home\NewsResource;
use App\Http\Resources\Api\Seo\SeoMetaResource;
use App\Models\University;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $university = university();

        $university->loadMissing([
            'hero',
            'about',
            'eligibilities',
            'whyChooseUs',
            'faqs',
            'footerCta',
            'news',
            'seo',
        ]);

        return response()->json([
            'success' => true,

            'data' => [

                'university' => [

                    'name' => $university->name,

                    'logo' => $university->logo,

                    'favicon' => $university->favicon,

                    'primary_color' => $university->primary_color,

                    'secondary_color' => $university->secondary_color,

                    'accent_color' => $university->accent_color,

                    'font_family' => $university->font_family,

                    'border_radius' => $university->border_radius,

                ],

                'hero' => $university->hero
                    ? new HeroResource($university->hero)
                    : null,

                'about' => $university->about
                    ? new AboutResource($university->about)
                    : null,

                'eligibilities' => EligibilityResource::collection(
                    $university->eligibilities
                ),

                'why_choose_us' => WhyChooseUsResource::collection(
                    $university->whyChooseUs
                ),

                'faqs' => FaqResource::collection(
                    $university->faqs
                ),

                'footer_cta' => $university->footerCta
                    ? new FooterCtaResource($university->footerCta)
                    : null,

                'news' => NewsResource::collection(
                    $university->news
                ),

                'seo' => $university->seo
                    ? new SeoMetaResource($university->seo)
                    : null,
            ]
        ]);
    }
}

