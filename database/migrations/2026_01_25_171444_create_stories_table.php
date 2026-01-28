<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('writer_id')->nullable()->constrained('users')->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('summary')->nullable();
            $table->longText('content');

            $table->string('cover')->nullable();
            $table->string('audio')->nullable();

            $table->string('age_group')->nullable();

            $table->string('status')->default('pending');
            $table->text('reject_reason')->nullable();

            $table->unsignedInteger('views_count')->default(0);
            $table->unsignedInteger('likes_count')->default(0);

            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->index(['status', 'created_at']);
            $table->index(['category_id']);
            $table->index(['writer_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('stories');
    }
};
