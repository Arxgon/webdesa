<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            // Target polymorphic (posts, bisa diperluas kepages)
            $table->morphs('commentable'); // commentable_type, commentable_id

            // Penulis komentar (user terdaftar atau guest)
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('author_name', 191)->nullable();
            $table->string('author_email', 191)->nullable();

            $table->text('content');
            $table->enum('status', ['pending','approved','rejected','spam'])->default('pending')->index();

            // Threading replies
            $table->foreignId('parent_id')->nullable()->constrained('comments')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();

            $table->index('deleted_at');
            
        });
    }

    public function down(): void {
        Schema::dropIfExists('comments');
    }
};
