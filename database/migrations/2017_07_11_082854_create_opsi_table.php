<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_opsi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('deskripsi', 128);
            $table->integer('id_pertanyaan')->unsigned();
            $table->timestamps();
        });

        Schema::table('tbl_opsi', function (Blueprint $table) {
            $table->foreign('id_pertanyaan')
            ->references('id')->on('tbl_pertanyaan')
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
        Schema::dropIfExists('tbl_opsi');
    }
}
