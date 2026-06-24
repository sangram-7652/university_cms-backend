<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {

            // Short description
            $table->text('excerpt')->nullable()->after('slug');

            // PDF upload
            $table->string('pdf_file')->nullable()->after('content');
        });
    }

    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {

            $table->dropColumn('excerpt');
            $table->dropColumn('pdf_file');
        });
    }
};
