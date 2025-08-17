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
        // Add soft deletes and indexes to services table
        Schema::table('services', function (Blueprint $table) {
            $table->softDeletes();
            
            // Indexes for better performance
            $table->index('is_active');
            $table->index('sort_order');
            $table->index(['is_active', 'sort_order']);
        });

        // Add soft deletes and indexes to service_descriptions table
        Schema::table('service_descriptions', function (Blueprint $table) {
            $table->softDeletes();
            
            // Indexes for better performance
            $table->index('service_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove indexes and soft deletes from services table
        Schema::table('services', function (Blueprint $table) {
            $table->dropIndex(['is_active']);
            $table->dropIndex(['sort_order']);
            $table->dropIndex(['is_active', 'sort_order']);
            $table->dropSoftDeletes();
        });

        // Remove indexes and soft deletes from service_descriptions table
        Schema::table('service_descriptions', function (Blueprint $table) {
            $table->dropIndex(['service_id']);
            $table->dropSoftDeletes();
        });
    }
};
