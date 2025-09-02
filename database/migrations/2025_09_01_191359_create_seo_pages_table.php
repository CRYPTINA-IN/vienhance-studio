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
        Schema::create('seo_pages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->string('slug')->unique();
            $table->string('featured_image')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_ai_generated')->default(false);
            $table->text('ai_prompt')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->index(['slug', 'is_active']);
            $table->index('published_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_pages');
    }
};
