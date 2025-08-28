<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('success_stories', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->foreignId('country_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('university')->nullable();
            $table->string('intake')->nullable();
            $table->boolean('visa_approved')->default(true);
            $table->string('image')->nullable();
            $table->text('summary')->nullable();
            $table->longText('testimonial')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('success_stories');
    }
};
