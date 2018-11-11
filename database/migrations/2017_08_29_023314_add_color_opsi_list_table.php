<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColorOpsiListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_opsi_list', function (Blueprint $table) {
            $table->enum('color_opsi_list', ['red', 'green', 'blue', 'yellow', 'purple', 'orange', 'grey']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_opsi_list', function (Blueprint $table) {
            //
        });
    }
}
