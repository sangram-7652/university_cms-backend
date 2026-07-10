<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alternative_university_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('alternative_university_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('university_name');

            $table->string('mode');

            $table->string('naac_grade');

            $table->integer('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alternative_university_items');
    }
};