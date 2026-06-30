<?php

namespace App\Http\Middleware;

use App\Models\University;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DetectUniversity
{
    public function handle(Request $request, Closure $next): Response
    {
        $host = strtolower($request->getHost());

        Log::info('Tenant Request', [
            'host' => $host,
            'url' => $request->fullUrl(),
            'headers' => $request->headers->all(),
        ]);

        /*
        |--------------------------------------------------------------------------
        | Detect Tenant
        |--------------------------------------------------------------------------
        */

        if (in_array($host, ['localhost', '127.0.0.1'])) {

            $slug = config('app.default_tenant', 'dusol');

        } elseif ($host === 'api.distanceeducationlearning.com') {

            // API domain se X-Tenant header use hoga
            $slug = strtolower(
                $request->header('X-Tenant', config('app.default_tenant', 'dusol'))
            );

        } else {

            // dusol.distanceeducationlearning.com
            // cuonline.distanceeducationlearning.com

            $parts = explode('.', $host);

            $slug = strtolower($parts[0] ?? '');

            // www ko ignore karo
            if ($slug === 'www') {
                $slug = config('app.default_tenant', 'dusol');
            }
        }

        Log::info('Tenant Slug', [
            'slug' => $slug,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Find University
        |--------------------------------------------------------------------------
        */

        $university = University::where('subdomain', $slug)
            ->where('is_active', true)
            ->first();

        if (!$university) {

            Log::error('Tenant Not Found', [
                'host' => $host,
                'slug' => $slug,
            ]);

            return response()->json([
                'success' => false,
                'message' => 'University not found',
                'host' => $host,
                'slug' => $slug,
            ], 404);
        }

        /*
        |--------------------------------------------------------------------------
        | Bind Tenant
        |--------------------------------------------------------------------------
        */

        app()->instance('currentUniversity', $university);

        Log::info('Tenant Loaded', [
            'id' => $university->id,
            'name' => $university->name,
            'subdomain' => $university->subdomain,
        ]);

        return $next($request);
    }
}