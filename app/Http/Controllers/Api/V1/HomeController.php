<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Home\HeroResource;
use App\Http\Resources\Api\Home\AboutResource;
use App\Http\Resources\Api\Home\EligibilityResource;
use App\Http\Resources\Api\Home\WhyChooseUsResource;
use App\Http\Resources\Api\Home\FaqResource;
use App\Http\Resources\Api\Home\KeyHighlightResource;
use App\Http\Resources\Api\Home\AdmissionProcedureResource;
use App\Http\Resources\Api\Home\FooterCtaResource;
use App\Http\Resources\Api\Home\NewsResource;
use App\Http\Resources\Api\Seo\SeoMetaResource;
use App\Http\Resources\Api\Home\ProgramResource;
use App\Models\SchemaSetting;
use App\Models\University;
use App\Services\Schema\SchemaService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(SchemaService $schemaService)
    {
        $university = university();

        $university->loadMissing([
            'hero',
            'about',
            'program',
            'eligibilities',
            'whyChooseUs',
            'faqs',
            'keyHighlights',
            'admissionProcedure',
            'footerCta',
            'news',
            'seo',
            'seoSetting',
        ]);

        $schema = $schemaService->generate(
            SchemaSetting::PAGE_UNIVERSITY,
            $university,
            $university->seo?->schema_override
        );

        $seo = null;

        if ($university->seo) {
            $seo = (new SeoMetaResource($university->seo))->resolve(request());
            $seo['schema'] = $schema;
        }

        return response()->json([
            'success' => true,

            'data' => [

                'university' => [

                    'name' => $university->name,
                    'short_name' => $university->short_name,
                    'tagline' => $university->tagline,
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
                'program' => $university->program
                    ? new ProgramResource($university->program)
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

                'keyHighlights' => KeyHighlightResource::collection(
                    $university->keyHighlights
                ),

                'admissionProcedure' => $university->admissionProcedure
                    ? new AdmissionProcedureResource($university->admissionProcedure)
                    : null,

                'footer_cta' => $university->footerCta
                    ? new FooterCtaResource($university->footerCta)
                    : null,

                'news' => NewsResource::collection(
                    $university->news
                ),

                'seo' => $seo,
            ]
        ]);
    }
}

