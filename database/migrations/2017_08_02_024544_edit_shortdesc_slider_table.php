<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditShortdescSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_slider', function (Blueprint $table) {
            // Edit Description Atribute
            $table->string('description')->nullable()->change();
            // Renaming
            $table->renameColumn('description', 'slider_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_slider', function (Blueprint $table) {
            //
        });
    }
}
