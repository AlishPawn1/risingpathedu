<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('heading')->nullable();
            $table->longText('content')->nullable();
            $table->longText('mission')->nullable();
            $table->longText('vision')->nullable();
            $table->string('image')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('meta_title', 70)->nullable();
            $table->string('meta_description', 160)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('about_us');
    }
};
