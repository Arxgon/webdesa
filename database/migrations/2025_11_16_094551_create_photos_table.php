<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained('albums')->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title', 255)->nullable();
            $table->text('caption')->nullable();
            $table->string('image_path', 2048); // path di storage
            $table->timestamp('taken_at')->nullable();
            $table->string('location', 255)->nullable();
            $table->unsignedInteger('order')->default(0)->index();
            $table->enum('status', ['visible','hidden'])->default('visible')->index();
            $table->timestamps();
            $table->softDeletes();
            $table->index('deleted_at');
        });
    }
    public function down(): void {
        Schema::dropIfExists('photos');
    }
};
