<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtyFlags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('judging_categories', function (Blueprint $table) {
            $table->boolean('include_boty')->nullable();
            $table->boolean('include_coty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('judging_categories', function (Blueprint $table) {
            $table->dropColumn('include_boty');
            $table->dropColumn('include_coty');
        });
    }
}
