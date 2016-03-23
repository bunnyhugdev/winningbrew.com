<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJudgingGuideToComp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->integer('judging_guide_id')->unsigned()->nullable();
            $table->foreign('judging_guide_id')->references('id')->on('judging_guides');
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
            $table->dropForeign('competitions_judging_guide_id_foreign');
            $table->dropColumn('judging_guide_id');
        });
    }
}
