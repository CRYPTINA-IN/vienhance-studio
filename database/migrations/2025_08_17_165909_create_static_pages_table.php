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
        Schema::create('static_pages', function (Blueprint $table) {
            $table->id();
            $table->string('page_name')->unique(); // home, about, services, portfolio, contact
            $table->string('route_name')->unique(); // home, about, services, portfolio, contact
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            
            // Open Graph (Facebook) Meta Tags
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->default('website');
            $table->string('og_url')->nullable();
            $table->string('og_site_name')->nullable();
            
            // Twitter Card Meta Tags
            $table->string('twitter_card')->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();
            
            // Additional SEO Fields
            $table->string('canonical_url')->nullable();
            $table->text('schema_markup')->nullable(); // JSON-LD structured data
            $table->boolean('is_active')->default(true);
            $table->integer('priority')->default(0); // For sitemap priority
            $table->string('change_frequency')->default('weekly'); // For sitemap
            $table->timestamps();
            
            // Indexes for better performance
            $table->index(['page_name', 'is_active']);
            $table->index(['route_name', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('static_pages');
    }
};
