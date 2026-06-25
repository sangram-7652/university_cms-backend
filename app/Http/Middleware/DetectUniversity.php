<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\University;

class DetectUniversity
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        if (in_array($host, ['localhost', '127.0.0.1'])) {

            $slug = env('DEFAULT_TENANT');
        } else {

            $slug = explode('.', $host)[0];
        }

        $university = University::where('subdomain', $slug)->first();

        if (!$university) {

            return response()->json([
                'success' => false,
                'message' => 'University not found',
                'host' => $host,
                'slug' => $slug,
            ], 404);
        }

        app()->instance('currentUniversity', $university);

        return $next($request);
    }
}
