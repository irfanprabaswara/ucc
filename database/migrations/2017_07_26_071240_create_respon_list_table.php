<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tbl_respon_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_respon')->unsigned();
            $table->integer('id_pertanyaan')->unsigned();
            $table->integer('id_opsi_list')->unsigned();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_respon_list');
    }
}
