<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('workers', function (Blueprint $table) {
            $table->longText('avatar_base64')->nullable()->after('avatar');
            $table->string('avatar_mime', 50)->nullable()->after('avatar_base64');
        });
    }

    public function down(): void
    {
        Schema::table('workers', function (Blueprint $table) {
            $table->dropColumn(['avatar_base64', 'avatar_mime']);
        });
    }
};
