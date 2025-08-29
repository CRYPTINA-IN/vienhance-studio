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
        Schema::create('meta_tags', function (Blueprint $table) {
            $table->id();
            
            // Polymorphic relationship
            $table->morphs('taggable');
            
            // Basic SEO
            $table->string('title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('canonical_url')->nullable();
            
            // Open Graph
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->default('website');
            $table->string('og_url')->nullable();
            $table->string('og_site_name')->nullable();
            
            // Twitter Card
            $table->string('twitter_card')->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();
            
            // Advanced SEO
            $table->json('schema_markup')->nullable();
            $table->decimal('priority', 2, 1)->default(0.5);
            $table->string('change_frequency')->default('monthly');
            $table->string('robots')->default('index, follow');
            
            // Additional Meta
            $table->string('author')->nullable();
            $table->string('language')->nullable();
            $table->string('geo_region')->nullable();
            $table->string('geo_placename')->nullable();
            $table->string('geo_position')->nullable();
            $table->string('icbm')->nullable();
            
            // Status
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Indexes
            $table->index(['taggable_type', 'taggable_id'], 'meta_tags_taggable_index');
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meta_tags');
    }
};
