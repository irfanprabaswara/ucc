<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChangesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('ttl')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('institution')->nullable()->default('XYZ University');
            $table->string('department')->nullable();
            $table->string('company_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['ttl','phone','address','institution','department','company_type']);
        });
    }
}
