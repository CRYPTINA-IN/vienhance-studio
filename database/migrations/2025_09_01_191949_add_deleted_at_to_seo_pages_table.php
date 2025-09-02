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
        Schema::table('seo_pages', function (Blueprint $table) {
            $table->softDeletes();
            $table->text('target_keywords')->nullable()->after('content');
            $table->text('seo_summary')->nullable()->after('target_keywords');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seo_pages', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn('target_keywords');
            $table->dropColumn('seo_summary');
        });
    }
};
