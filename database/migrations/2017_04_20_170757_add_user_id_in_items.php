<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdInItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('items', function (Blueprint $table) {
        //     $table->integer('user_id')->unique();
        //     //
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('items', function (Blueprint $table) {
        //     $table->dropColumn('user_id');
        //     //
        // });
    }
}
