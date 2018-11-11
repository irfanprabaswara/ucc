<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldContactUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_contact_us', function (Blueprint $table) {
            $table->dropColumn('social_contact');
            $table->dropColumn('url_contact');
        });

        Schema::table('tbl_contact_us', function (Blueprint $table) {
            $table->enum('social_contact', ['twitter', 'facebook', 'youtube', 'linkedin', 'gplus', 'instagram', 'line', 'pinterest', 'phone', 'email', 'address']);
            $table->string('content_contact', 512);
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_contact_us', function (Blueprint $table) {
            //
        });
    }
}
