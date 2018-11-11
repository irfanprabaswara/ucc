<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditActiveAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_about', function (Blueprint $table) {
            // Drop Active Field
            $table->dropColumn('active_about');
        });

        Schema::table('tbl_about', function (Blueprint $table) {
            // Edit Active Field
            $table->enum('active_about', ['Deactive', 'Active'])->default('Deactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_about', function (Blueprint $table) {
            //
        });
    }
}
