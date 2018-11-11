<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePertanyaanTable extends Migration
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
            $table->integer('id_opsi')->unsigned()->nullable()->change();

            // Update on delete constraint
            $table->foreign('id_opsi')
                  ->references('id')->on('tbl_opsi')
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
