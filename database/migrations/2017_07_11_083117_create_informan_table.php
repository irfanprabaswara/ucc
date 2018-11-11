<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_informan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 512);
            $table->string('jabatan', 128);
            $table->string('email', 128);
            $table->string('telpon', 32);
            $table->string('perusahaan', 128);
            $table->string('email_perusahaan', 128);
            $table->string('telpon_perusahaan', 32);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_informan');
    }
}
