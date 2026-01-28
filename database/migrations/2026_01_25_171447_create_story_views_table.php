<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('story_views', function (Blueprint $table) {
            $table->id();

            $table->foreignId('story_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();

            $table->string('ip')->nullable();
            $table->string('user_agent')->nullable();

            $table->timestamps();

            $table->index(['story_id', 'created_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('story_views');
    }
};
