<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('tbl_respon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_informan')->unsigned();
            $table->integer('id_pertanyaan')->unsigned();
            $table->integer('id_opsi')->unsigned();
            $table->timestamps();
        });

        Schema::table('tbl_respon', function (Blueprint $table) {
            $table->foreign('id_informan')
            ->references('id')->on('tbl_informan')
            ->onDelete('cascade');

            $table->foreign('id_pertanyaan')
            ->references('id')->on('tbl_pertanyaan')
            ->onDelete('cascade');

            $table->foreign('id_opsi')
            ->references('id')->on('tbl_opsi')
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
        Schema::dropIfExists('tbl_respon');
    }
}
