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
        Schema::create('sitemap_settings', function (Blueprint $table) {

            $table->id();

            $table->boolean('universities_enabled')
                ->default(true);

            $table->boolean('courses_enabled')
                ->default(true);

            $table->boolean('specializations_enabled')
                ->default(true);

            $table->boolean('blogs_enabled')
                ->default(true);

            $table->string('change_frequency')
                ->default('weekly');

            $table->decimal('priority', 2, 1)
                ->default(0.8);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sitemap_settings');
    }
};
