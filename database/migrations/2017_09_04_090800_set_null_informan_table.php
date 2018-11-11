<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetNullInformanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_informan', function (Blueprint $table) {
            //
            $table->string('nama', 512)->nullable()->change();
            $table->string('jabatan', 128)->nullable()->change();
            $table->string('email', 128)->nullable()->change();
            $table->string('telpon', 32)->nullable()->change();
            $table->string('perusahaan', 128)->nullable()->change();
            $table->string('email_perusahaan', 128)->nullable()->change();
            $table->string('telpon_perusahaan', 32)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_informan', function (Blueprint $table) {
            //
        });
    }
}
