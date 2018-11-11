<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationPostKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_post', function (Blueprint $table) {
            // Create relation with tbl_kategori
            $table->foreign('id_category')
                  ->references('id')->on('tbl_kategori')
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
        Schema::table('tbl_post', function (Blueprint $table) {
            //
        });
    }
}
