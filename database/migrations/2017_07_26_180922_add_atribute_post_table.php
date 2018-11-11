<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtributePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_post', function (Blueprint $table) {
            // Add atribute
            $table->string('slug')->nullable();
            $table->string('tags')->nullable();
            $table->integer('cms_users_id')->unsigned()->nullable();
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
