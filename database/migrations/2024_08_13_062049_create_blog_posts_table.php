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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index(); // Unique title
            $table->string('url_slug')->unique();
            $table->string('image_path')->nullable();
            $table->longText('content')->nullable(); // Optional content, if necessary
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade'); // Foreign key for author with cascade delete
            $table->dateTime('publish_date')->nullable();
            $table->enum('status', ['published', 'draft'])->default('draft'); // Default status set to draft
            $table->timestamps();
            $table->softDeletes(); // For soft deletion
        
            // Add index for author_id for faster lookups by author
            $table->index('author_id');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
};
