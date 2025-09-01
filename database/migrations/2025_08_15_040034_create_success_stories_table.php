<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('success_stories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('student_name');
            $table->string('country');
            $table->string('service');
            $table->string('university');
            $table->string('intake');
            $table->boolean('visa_approved')->default(false);
            $table->string('image');
            $table->text('summary');
            $table->longText('testimonial');
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('success_stories');
    }
};
