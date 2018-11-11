<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOpsiListConstraintResponListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_respon_list', function (Blueprint $table) {
            $table->foreign('id_opsi_list')
                  ->references('id')->on('tbl_opsi_list')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_respon_list', function (Blueprint $table) {
            //
        });
    }
}
