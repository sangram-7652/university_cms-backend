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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();

            // Multi Tenant
            $table->foreignId('university_id')
                ->constrained()
                ->cascadeOnDelete();

            // Content
            $table->string('title');
            $table->text('short_description')->nullable();
            $table->longText('content')->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            // One admission page per university
            $table->unique('university_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};