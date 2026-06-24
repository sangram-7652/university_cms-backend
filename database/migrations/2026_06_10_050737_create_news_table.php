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
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->foreignId('university_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');

            $table->string('slug')->unique();

            // Short summary
            $table->text('excerpt')->nullable();

            // Article content (optional)
            $table->longText('content')->nullable();

            // PDF attachment (optional)
            $table->string('pdf_file')->nullable();

            $table->date('publish_date');

            // Fixed typo
            $table->string('featured_image')->nullable();

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
