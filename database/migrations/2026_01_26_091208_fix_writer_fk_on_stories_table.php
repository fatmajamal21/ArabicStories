<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('stories', function (Blueprint $table) {

            try {
                $table->dropForeign(['writer_id']);
            } catch (\Throwable $e) {
            }

            try {
                $table->dropIndex(['writer_id']);
            } catch (\Throwable $e) {
            }
        });

        Schema::table('stories', function (Blueprint $table) {
            $table->foreign('writer_id', 'stories_writer_id_fk_writers')
                ->references('id')
                ->on('writers')
                ->nullOnDelete();
        });
    }

    public function down()
    {
        Schema::table('stories', function (Blueprint $table) {
            $table->dropForeign('stories_writer_id_fk_writers');
        });
    }
};
