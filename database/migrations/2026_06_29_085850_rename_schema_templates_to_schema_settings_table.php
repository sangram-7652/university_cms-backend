<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up(): void
    {
        Schema::rename('schema_templates', 'schema_settings');
    }

    public function down(): void
    {
        Schema::rename('schema_settings', 'schema_templates');
    }
};
