<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('specializations', function (Blueprint $table) {

            $table->enum('course_level', [
                'UG',
                'PG',
                'Diploma',
                'Certificate',
                'Doctorate',
            ])->nullable()->after('duration_type');

            $table->enum('study_mode', [
                'Distance',
                'Online',
                'Regular',
                'Hybrid',
            ])->nullable()->after('course_level');

            $table->string('language')->default('English')->after('study_mode');
        });
    }

    public function down(): void
    {
        Schema::table('specializations', function (Blueprint $table) {
            $table->dropColumn([
                'course_level',
                'study_mode',
                'language',
            ]);
        });
    }
};