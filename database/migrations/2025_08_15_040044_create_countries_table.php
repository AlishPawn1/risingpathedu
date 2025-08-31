<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('flag')->nullable();
            $table->string('image')->nullable();
            $table->string('short_text')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->text('institutes')->nullable(); 
            $table->string('media_type')->nullable();
            $table->string('media_url')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};