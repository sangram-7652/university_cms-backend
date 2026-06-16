<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {

            $table->id();

            $table->foreignId('university_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->string('slug')->unique();

            $table->string('short_name')->nullable();

            $table->integer('duration')->nullable();

            $table->enum('duration_type', [
                'Years',
                'Months',
                'Weeks'
            ])->default('Years');

            $table->enum('course_level', [
                'UG',
                'PG',
                'Diploma',
                'Certificate',
                'Doctorate'
            ])->nullable();

            $table->enum('study_mode', [
                'Online',
                'Distance',
                'Regular',
                'Hybrid'
            ])->nullable();

            $table->string('language')
                ->default('English');

            $table->text('short_description')
                ->nullable();

            $table->longText('overview')
                ->nullable();

            $table->longText('eligibility')
                ->nullable();

            $table->longText('admission_process')
                ->nullable();

            $table->longText('career_scope')
                ->nullable();

            $table->boolean('is_featured')
                ->default(false);

            $table->boolean('status')
                ->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
