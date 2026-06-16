<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('seo_settings', function (Blueprint $table) {

            $table->id();

            $table->string('site_name')->nullable();

            $table->string('default_title')->nullable();
            $table->text('default_description')->nullable();
            $table->text('default_keywords')->nullable();

            $table->string('default_og_image')->nullable();

            $table->string('google_analytics_id')->nullable();
            $table->string('google_tag_manager_id')->nullable();

            $table->string('facebook_pixel_id')->nullable();

            $table->text('google_verification')->nullable();
            $table->text('bing_verification')->nullable();
            $table->string('canonical_domain')->nullable();

            $table->string('twitter_handle')->nullable();

            $table->string('contact_email')->nullable();

            $table->string('contact_phone')->nullable();

            $table->boolean('enable_schema')
                ->default(true);

            $table->boolean('enable_sitemap')
                ->default(true);

            $table->boolean('enable_robots')
                ->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('seo_settings');
    }
};
