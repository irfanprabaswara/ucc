<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePertanyaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pertanyaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pertanyaan', 512);
            $table->integer('id_aspek')->unsigned();
            $table->timestamps();
        });

        Schema::table('tbl_pertanyaan', function (Blueprint $table) {
            $table->foreign('id_aspek')
            ->references('id')->on('tbl_aspek')
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
        Schema::dropIfExists('tbl_pertanyaan');
    }
}
