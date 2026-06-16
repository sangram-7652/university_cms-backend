<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_heroes', function (Blueprint $table) {
            $table->foreign('university_id')
                ->references('id')
                ->on('universities')
                ->cascadeOnDelete();
        });

        Schema::table('news', function (Blueprint $table) {

            $table->foreign('university_id')
                ->references('id')
                ->on('universities')
                ->cascadeOnDelete();

            $table->unique('slug');
        });
    }

    public function down(): void
    {
        Schema::table('homepage_heroes', function (Blueprint $table) {
            $table->dropForeign(['university_id']);
        });

        Schema::table('news', function (Blueprint $table) {
            $table->dropForeign(['university_id']);
            $table->dropUnique(['slug']);
        });
    }
};