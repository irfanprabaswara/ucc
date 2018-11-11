<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveConstraintResponPertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_respon', function (Blueprint $table) {
            //Add URL
            $table->dropForeign('tbl_respon_id_pertanyaan_foreign');
        });
        Schema::table('tbl_respon', function (Blueprint $table){
            $table->dropColumn('id_pertanyaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
