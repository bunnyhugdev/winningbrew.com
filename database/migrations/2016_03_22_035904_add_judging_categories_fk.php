<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJudgingCategoriesFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('judging_categories', function (Blueprint $table) {
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
        Schema::table('judging_categories', function (Blueprint $table) {
            $table->dropForeign('judging_categories_judging_guide_id_foreign');
        });
    }
}
