<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->renameColumn('features_image', 'featured_image');
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->renameColumn('featured_image', 'features_image');
        });
    }
};
