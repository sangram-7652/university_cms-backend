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
use App\Models\University;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $university = University::query()
            ->with([
                'hero',
                'about',
                'eligibilities',
                'whyChooseUs',
                'faqs',
                'footerCta',
                'news'
            ])
            ->first();

        if (!$university) {
            return response()->json([
                'success' => false,
                'message' => 'University not found'
            ], 404);
        }

        return response()->json([

            'success' => true,

            'data' => [

                'hero' => new HeroResource(
                    $university->hero
                ),

                'about' => new AboutResource(
                    $university->about
                ),

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
                )

            ]

        ]);
    }
}
