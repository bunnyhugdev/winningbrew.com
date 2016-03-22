<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddJudgeGuideMapping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judging_category_mappings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('judging_category_id')->unsigned();
            $table->integer('style_id')->unsigned();
            $table->timestamps();

            $table->foreign('judging_category_id')
                ->references('id')->on('judging_categories');
            $table->foreign('style_id')
                ->references('id')->on('styles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('judging_category_mappings');
    }
}
