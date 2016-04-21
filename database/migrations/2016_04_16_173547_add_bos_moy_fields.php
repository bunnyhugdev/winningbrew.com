<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBosMoyFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->integer('first_bos_id')->unsigned()->nullable();
            $table->integer('second_bos_id')->unsigned()->nullable();
            $table->integer('third_bos_id')->unsigned()->nullable();

            $table->integer('first_mmoy_id')->unsigned()->nullable();
            $table->integer('second_mmoy_id')->unsigned()->nullable();
            $table->integer('third_mmoy_id')->unsigned()->nullable();

            $table->integer('first_cmoy_id')->unsigned()->nullable();
            $table->integer('second_cmoy_id')->unsigned()->nullable();
            $table->integer('third_cmoy_id')->unsigned()->nullable();

            $table->foreign('first_bos_id')->references('id')->on('entries');
            $table->foreign('second_bos_id')->references('id')->on('entries');
            $table->foreign('third_bos_id')->references('id')->on('entries');

            $table->foreign('first_mmoy_id')->references('id')->on('entries');
            $table->foreign('second_mmoy_id')->references('id')->on('entries');
            $table->foreign('third_mmoy_id')->references('id')->on('entries');

            $table->foreign('first_cmoy_id')->references('id')->on('entries');
            $table->foreign('second_cmoy_id')->references('id')->on('entries');
            $table->foreign('third_cmoy_id')->references('id')->on('entries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->dropForeign('competitions_first_bos_id');
            $table->dropForeign('competitions_second_bos_id');
            $table->dropForeign('competitions_third_bos_id');

            $table->dropForeign('competitions_first_mmoy_id');
            $table->dropForeign('competitions_second_mmoy_id');
            $table->dropForeign('competitions_third_mmoy_id');

            $table->dropForeign('competitions_first_cmoy_id');
            $table->dropForeign('competitions_second_cmoy_id');
            $table->dropForeign('competitions_third_cmoy_id');

            $table->dropColumn('first_bos_id');
            $table->dropColumn('second_bos_id');
            $table->dropColumn('third_bos_id');

            $table->dropColumn('first_mmoy_id');
            $table->dropColumn('second_mmoy_id');
            $table->dropColumn('third_mmoy_id');

            $table->dropColumn('first_cmoy_id');
            $table->dropColumn('second_cmoy_id');
            $table->dropColumn('third_cmoy_id');
        });
    }
}
