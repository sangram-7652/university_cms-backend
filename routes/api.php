<?php

use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\Api\V1\UniversityController;
use App\Http\Controllers\Api\V1\CourseController;
use App\Http\Controllers\Api\V1\CurriculumController;
use App\Http\Controllers\Api\V1\SpecializationController;
use App\Http\Controllers\Api\V1\FeeController;
use App\Http\Controllers\Api\V1\SemesterController;
use App\Http\Controllers\Api\V1\SubjectController;
use App\Http\Controllers\Api\V1\FaqController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\BlogFaqController;
use App\Http\Controllers\Api\V1\LeadController;
use App\Http\Controllers\Api\V1\SeoController;



use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get('/test', function () {
        return response()->json([
            'success' => true,
            'message' => 'API Working',
        ]);
    });


    Route::get('/universities', [UniversityController::class, 'index']);
    Route::get('/universities/{slug}', [UniversityController::class, 'show']);

    Route::middleware('university')->group(function () {
        Route::get('/tenant-check', function () {

            return response()->json([

                'helper_exists' => function_exists('university'),

                'bound' => app()->bound('currentUniversity'),

                'current' => app()->bound('currentUniversity')
                    ? app('currentUniversity')
                    : null,

            ]);
        });

        Route::get('/home', [HomeController::class, 'index']);
        Route::get('/courses', [CourseController::class, 'index']);
        Route::get(
            '/courses/{slug}',
            [CourseController::class, 'show']
        );
        Route::get(
            '/specializations',
            [SpecializationController::class, 'index']
        );
        Route::get(
            '/specializations/{slug}',
            [SpecializationController::class, 'show']
        );
        Route::get(
            '/courses/{slug}/specializations',
            [SpecializationController::class, 'byCourse']
        );

        Route::get(
            '/fees',
            [FeeController::class, 'index']
        );

        Route::get(
            '/fees/{id}',
            [FeeController::class, 'show']
        );

        // Route::get(
        //     '/courses/{slug}/fees',
        //     [FeeController::class, 'byCourse']
        // );

        Route::get(
            '/specializations/{slug}/fees',
            [FeeController::class, 'bySpecialization']
        );

        Route::get(
            '/curricula',
            [CurriculumController::class, 'index']
        );

        Route::get(
            '/curricula/{slug}',
            [CurriculumController::class, 'show']
        );

        Route::get(
            'curricula/{curriculum}/semesters',
            [SemesterController::class, 'index']
        );

        Route::get(
            'semesters/{semester}/subjects',
            [SubjectController::class, 'index']
        );

        Route::get(
            '/courses/{course}/faqs',
            [FaqController::class, 'courseFaqs']
        );

        Route::get(
            '/specializations/{specialization}/faqs',
            [FaqController::class, 'specializationFaqs']
        );

        Route::get('/blogs', [BlogController::class, 'index']);

        Route::get('/blogs/{slug}', [BlogController::class, 'show']);

        Route::get(
            '/blogs/{blog}/faqs',
            [BlogFaqController::class, 'index']

        );

        Route::post('/leads', [LeadController::class, 'store']);

    });
});
