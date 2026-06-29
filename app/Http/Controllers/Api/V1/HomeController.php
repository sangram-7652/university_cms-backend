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

                'hero' => new HeroResource($university->hero),

                'about' => new AboutResource($university->about),

                'eligibilities' => EligibilityResource::collection(
                    $university->eligibilities
                ),

                'why_choose_us' => WhyChooseUsResource::collection(
                    $university->whyChooseUs
                ),

                'faqs' => FaqResource::collection(
                    $university->faqs
                ),

                'footer_cta' => new FooterCtaResource(
                    $university->footerCta
                ),

                'news' => NewsResource::collection(
                    $university->news
                ),

                'seo' => SeoMetaResource::collection(
                    $university->seo
                )
            ]
        ]);
    }
}
