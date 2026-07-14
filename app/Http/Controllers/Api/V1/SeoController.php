<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Course;
use App\Models\RobotsSetting;
use App\Models\SitemapSetting;
use App\Models\Specialization;

class SeoController extends Controller
{
    /**
     * robots.txt
     */
    public function robots()
    {

        $setting = RobotsSetting::where(
            'university_id',
            university()->id
        )->first();

        if (!$setting || !$setting->enabled) {
            return response('', 404);
        }

        $baseUrl = request()->getSchemeAndHttpHost();

        $content = [];

        $content[] = 'User-agent: ' . ($setting->default_user_agent ?: '*');
        $content[] = '';

        foreach ($setting->allow_paths ?? [] as $item) {
            if (!empty($item['path'])) {
                $content[] = 'Allow: ' . $item['path'];
            }
        }

        foreach ($setting->disallow_paths ?? [] as $item) {
            if (!empty($item['path'])) {
                $content[] = 'Disallow: ' . $item['path'];
            }
        }
        if ($setting->include_sitemap) {
            $content[] = '';
            $content[] = 'Sitemap: ' . $baseUrl . '/sitemap.xml';
        }

        if (!empty($setting->custom_content)) {
            $content[] = '';
            $content[] = trim($setting->custom_content);
        }

        return response(
            implode("\n", $content),
            200,
            [
                'Content-Type' => 'text/plain'
            ]
        );
    }

    /**
     * sitemap.xml
     */
    public function sitemap()
    {
        
        $setting = SitemapSetting::where(
            'university_id',
            university()->id
        )->first();
        dd($setting);

        if (!$setting) {
            abort(404);
        }

        $baseUrl = request()->getSchemeAndHttpHost();

        $xml = [];

        $xml[] = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml[] = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Home
        $xml[] = '<url>';
        $xml[] = '<loc>' . $baseUrl . '</loc>';
        $xml[] = '<changefreq>' . $setting->change_frequency . '</changefreq>';
        $xml[] = '<priority>1.0</priority>';
        $xml[] = '</url>';

        // Courses
        if ($setting->courses_enabled) {

            Course::where('university_id', university()->id)
                ->where('status', true)
                ->get()
                ->each(function ($course) use (&$xml, $baseUrl, $setting) {

                    $xml[] = '<url>';
                    $xml[] = '<loc>' . $baseUrl . '/courses/' . $course->slug . '</loc>';
                    $xml[] = '<changefreq>' . $setting->change_frequency . '</changefreq>';
                    $xml[] = '<priority>' . $setting->priority . '</priority>';
                    $xml[] = '</url>';
                });
        }

        // Blogs
        if ($setting->blogs_enabled) {

            Blog::where('university_id', university()->id)
                ->where('status', true)
                ->get()
                ->each(function ($blog) use (&$xml, $baseUrl, $setting) {

                    $xml[] = '<url>';
                    $xml[] = '<loc>' . $baseUrl . '/blogs/' . $blog->slug . '</loc>';
                    $xml[] = '<changefreq>' . $setting->change_frequency . '</changefreq>';
                    $xml[] = '<priority>' . $setting->priority . '</priority>';
                    $xml[] = '</url>';
                });
        }

        // Specializations
        if ($setting->specializations_enabled) {

            Specialization::where('is_active', true)
                ->whereHas('course', function ($query) {
                    $query->where('university_id', university()->id);
                })
                ->get()
                ->each(function ($specialization) use (&$xml, $baseUrl, $setting) {

                    $xml[] = '<url>';
                    $xml[] = '<loc>' . $baseUrl . '/specializations/' . $specialization->slug . '</loc>';
                    $xml[] = '<changefreq>' . $setting->change_frequency . '</changefreq>';
                    $xml[] = '<priority>' . $setting->priority . '</priority>';
                    $xml[] = '</url>';
                });
        }

        $xml[] = '</urlset>';

        return response(
            implode("\n", $xml),
            200,
            [
                'Content-Type' => 'application/xml'
            ]
        );
    }
}
