<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tenants', function (Blueprint $table): void {
            $table->string('wordpress_site_url')->nullable()->unique();
            $table->boolean('wordpress_retail_enabled')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table): void {
            $table->dropUnique(['wordpress_site_url']);
            $table->dropColumn(['wordpress_site_url', 'wordpress_retail_enabled']);
        });
    }
};
