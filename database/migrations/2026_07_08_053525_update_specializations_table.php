<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('specializations', function (Blueprint $table) {

            // Change Duration
            $table->integer('duration')->nullable()->change();

            $table->enum('duration_type', [
                'Years',
                'Months',
                'Weeks',
            ])->default('Years')->after('duration');

            // Rename description to overview
            $table->renameColumn('description', 'overview');

            // Change eligibility
            $table->longText('eligibility')->nullable()->change();

            // New Content Fields
            $table->longText('admission_process')->nullable()->after('eligibility');

            $table->longText('career_scope')->nullable()->after('admission_process');

            // Rename is_active to status
            $table->renameColumn('is_active', 'status');
        });
    }

    public function down(): void
    {
        Schema::table('specializations', function (Blueprint $table) {

            $table->renameColumn('overview', 'description');

            $table->renameColumn('status', 'is_active');

            $table->dropColumn([
                'duration_type',
                'admission_process',
                'career_scope',
            ]);

            $table->string('duration')->nullable()->change();

            $table->string('eligibility')->nullable()->change();
        });
    }
};