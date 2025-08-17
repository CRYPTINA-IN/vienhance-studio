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
        Schema::create('service_descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->text('section_1');
            $table->text('section_2');
            $table->text('section_3');
            $table->json('benefits');
            $table->json('process');
            $table->json('faqs');
            $table->softDeletes();
            $table->timestamps();

            // Indexes for better performance
            $table->index('service_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_descriptions');
    }
};
