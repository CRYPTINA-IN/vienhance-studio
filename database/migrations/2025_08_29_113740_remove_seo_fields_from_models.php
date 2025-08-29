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
        // Remove SEO fields from blogs table
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'meta_description',
                'meta_keywords',
                'og_title',
                'og_description',
                'og_image',
                'og_type',
                'og_url',
                'og_site_name',
                'twitter_card',
                'twitter_title',
                'twitter_description',
                'twitter_image',
                'twitter_site',
                'twitter_creator',
                'canonical_url',
                'schema_markup',
                'priority',
                'change_frequency',
            ]);
        });

        // Remove SEO fields from portfolios table
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn([
                'meta_title',
                'meta_description',
                'meta_keywords',
                'og_title',
                'og_description',
                'og_image',
                'og_type',
                'og_url',
                'og_site_name',
                'twitter_card',
                'twitter_title',
                'twitter_description',
                'twitter_image',
                'twitter_site',
                'twitter_creator',
                'canonical_url',
                'schema_markup',
                'priority',
                'change_frequency',
            ]);
        });

        // Remove SEO fields from static_pages table
        Schema::table('static_pages', function (Blueprint $table) {
            $table->dropColumn([
                'meta_description',
                'meta_keywords',
                'og_title',
                'og_description',
                'og_image',
                'og_type',
                'og_url',
                'og_site_name',
                'twitter_card',
                'twitter_title',
                'twitter_description',
                'twitter_image',
                'twitter_site',
                'twitter_creator',
                'canonical_url',
                'schema_markup',
                'priority',
                'change_frequency',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back SEO fields to blogs table
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->default('article');
            $table->string('og_url')->nullable();
            $table->string('og_site_name')->nullable();
            $table->string('twitter_card')->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();
            $table->string('canonical_url')->nullable();
            $table->json('schema_markup')->nullable();
            $table->decimal('priority', 2, 1)->default(0.5);
            $table->string('change_frequency')->default('monthly');
        });

        // Add back SEO fields to portfolios table
        Schema::table('portfolios', function (Blueprint $table) {
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->default('article');
            $table->string('og_url')->nullable();
            $table->string('og_site_name')->nullable();
            $table->string('twitter_card')->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();
            $table->string('canonical_url')->nullable();
            $table->json('schema_markup')->nullable();
            $table->decimal('priority', 2, 1)->default(0.5);
            $table->string('change_frequency')->default('monthly');
        });

        // Add back SEO fields to static_pages table
        Schema::table('static_pages', function (Blueprint $table) {
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();
            $table->string('og_type')->default('website');
            $table->string('og_url')->nullable();
            $table->string('og_site_name')->nullable();
            $table->string('twitter_card')->default('summary_large_image');
            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();
            $table->string('twitter_site')->nullable();
            $table->string('twitter_creator')->nullable();
            $table->string('canonical_url')->nullable();
            $table->json('schema_markup')->nullable();
            $table->integer('priority')->default(0);
            $table->string('change_frequency')->default('monthly');
        });
    }
};
