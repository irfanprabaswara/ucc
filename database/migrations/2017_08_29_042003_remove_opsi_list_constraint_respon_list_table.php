<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveOpsiListConstraintResponListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_respon_list', function (Blueprint $table) {
            //
            $table->dropForeign('tbl_respon_list_id_opsi_list_foreign');
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
