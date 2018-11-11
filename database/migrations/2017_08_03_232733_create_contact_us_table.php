<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_contact_us', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('social_contact', ['twitter', 'facebook', 'youtube', 'linkedin', 'gplus', 'instagram', 'line']);
            $table->string('url_contact');
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
        Schema::dropIfExists('tbl_contact_us');
    }
}
