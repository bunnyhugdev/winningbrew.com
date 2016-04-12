<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('competition_id')->unsigned();
            $table->integer('judging_category_id')->unsigned();
            $table->integer('first_entry_id')->unsigned()->nullable();
            $table->integer('second_entry_id')->unsigned()->nullable();
            $table->integer('third_entry_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('competition_id')->references('id')->on("competitions");
            $table->foreign('judging_category_id')->references('id')->on('judging_categories');
            $table->foreign('first_entry_id')->references('id')->on('entries');
            $table->foreign('second_entry_id')->references('id')->on('entries');
            $table->foreign('third_entry_id')->references('id')->on('entries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('results');
    }
}
