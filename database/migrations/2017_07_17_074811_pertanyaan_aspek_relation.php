<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PertanyaanAspekRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_pertanyaan', function (Blueprint $table) {
            //Set nullable
            $table->integer('id_aspek')->unsigned()->nullable()->change();

            // Update on delete constraint
            $table->dropForeign('tbl_pertanyaan_id_aspek_foreign');
            $table->foreign('id_aspek')
                  ->references('id')->on('tbl_aspek')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_pertanyaan', function (Blueprint $table) {
            //
        });
    }
}
