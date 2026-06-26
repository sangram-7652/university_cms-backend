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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subdomain')->unique();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('email')->Nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('primary_color')->default('');
            $table->string('secondary_color')->default('');
            $table->string('accent_color')->default('');
            $table->string('font_family')->nullable();
            $table->string('border_radius')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
