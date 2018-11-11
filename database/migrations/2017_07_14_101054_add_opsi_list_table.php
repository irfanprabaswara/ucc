<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOpsiListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('tbl_pertanyaan', function (Blueprint $table) {
            $table->foreign('id_opsi')
            ->references('id')->on('tbl_opsi')
            ->onDelete('cascade');            
        });

        Schema::create('tbl_opsi_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_list');
            $table->integer('id_opsi')->unsigned();
            $table->foreign('id_opsi')->references('id')->on('tbl_opsi');
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
        Schema::table('tbl_pertanyaan', function (Blueprint $table) {
            //
        });
    }
}
