<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditActiveSambutanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_sambutan', function (Blueprint $table) {
            // Drop Active Field
            $table->dropColumn('active_sambutan');
        });

        Schema::table('tbl_sambutan', function (Blueprint $table) {
            // Edit Active Field
            $table->enum('active_sambutan', ['Deactive', 'Active'])->default('Deactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_sambutan', function (Blueprint $table) {
            //
        });
    }
}
