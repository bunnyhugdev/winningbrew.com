<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->text('rules');
            $table->date('entry_open');
            $table->date('entry_close');
            $table->date('judge_start');
            $table->date('judge_end');
            $table->date('result_at');
            $table->string('ship_address1');
            $table->string('ship_address2');
            $table->string('ship_city');
            $table->string('ship_province');
            $table->string('ship_postal_code');
            $table->string('contact_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('competitions');
    }
}
