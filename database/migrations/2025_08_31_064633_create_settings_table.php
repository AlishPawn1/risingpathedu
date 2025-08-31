<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            
            // Branding
            $table->string('site_name')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('favicon')->nullable();

            // Contact info
            $table->string('email')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('secondary_contact_number')->nullable();
            $table->string('location')->nullable();
            $table->text('map_embed')->nullable();

            // SEO / Meta
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            // Social links
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();

            // Extra content
            $table->text('footer_text')->nullable();
            $table->timestamps();
            $table->string('business_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
