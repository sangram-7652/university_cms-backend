<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('robots_settings', function (Blueprint $table) {
            $table->id();

            $table->boolean('enabled')
                ->default(true);

            $table->string('default_user_agent')
                ->default('*');

            $table->json('allow_paths')
                ->nullable();

            $table->json('disallow_paths')
                ->nullable();

            $table->boolean('include_sitemap')
                ->default(true);

            $table->longText('custom_content')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('robots_settings');
    }
};
