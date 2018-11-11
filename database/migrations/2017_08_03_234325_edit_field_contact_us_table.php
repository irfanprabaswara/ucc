<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditFieldContactUsTable extends Migration
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
        });

        Schema::table('tbl_contact_us', function (Blueprint $table) {
            $table->enum('social_contact', ['Twitter', 'Facebook', 'Youtube', 'Linkedin', 'Google Plus', 'Instagram', 'Line', 'Pinterest', 'Phone', 'Email', 'Address']);            
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
