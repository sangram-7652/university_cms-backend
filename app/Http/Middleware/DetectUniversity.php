use Illuminate\Support\Facades\Log;

public function handle(Request $request, Closure $next)
{
    $host = $request->getHost();

    Log::info('Tenant Debug', [
        'host' => $host,
        'headers' => $request->headers->all(),
    ]);

    if (in_array($host, ['localhost', '127.0.0.1'])) {
        $slug = env('DEFAULT_TENANT', 'dusol');
    } elseif ($host === 'api.distanceeducationlearning.com') {
        $slug = $request->header('X-Tenant', env('DEFAULT_TENANT', 'dusol'));
    } else {
        $slug = explode('.', $host)[0];
    }

    Log::info('Tenant Slug', [
        'slug' => $slug,
    ]);

    $university = University::where('subdomain', $slug)->first();

    if (!$university) {
        Log::error('Tenant Not Found', [
            'slug' => $slug,
            'host' => $host,
        ]);

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