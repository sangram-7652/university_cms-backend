<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SeoController;

Route::get('/', function () {
    return response()->json([
        'success' => true,
        'message' => 'API Working',
    ]);
});
Route::get('/robots.txt', [SeoController::class, 'robots'])
    ->name('robots');

Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])
    ->name('sitemap');
