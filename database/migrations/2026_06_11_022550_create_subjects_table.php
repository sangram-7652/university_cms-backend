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
        Schema::create('subjects', function (Blueprint $table) {

            $table->id();

            $table->foreignId('semester_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('subject_code')
                ->nullable();

            $table->string('subject_name');

            $table->integer('credits')
                ->nullable();

            $table->enum('subject_type', [
                'theory',
                'practical',
                'project',
                'elective',
            ])->default('theory');

            $table->text('description')
                ->nullable();

            $table->integer('display_order')
                ->default(0);

            $table->boolean('is_active')
                ->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
