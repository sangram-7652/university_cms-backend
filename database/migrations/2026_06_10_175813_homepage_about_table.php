<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_abouts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('university_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('subtitle')->nullable();

            $table->text('description');

            $table->string('image')->nullable();

            $table->text('vision')->nullable();
            $table->text('mission')->nullable();

            $table->boolean('status')->default(true);

            $table->timestamps();

            $table->unique('university_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_abouts');
    }
};
