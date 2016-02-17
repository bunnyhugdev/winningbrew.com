<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToCompetitions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->string('description')->nullable()->change();
            $table->text('rules')->nullable()->change();;
            $table->date('entry_open')->nullable()->change();;
            $table->date('entry_close')->nullable()->change();;
            $table->date('judge_start')->nullable()->change();;
            $table->date('judge_end')->nullable()->change();;
            $table->date('result_at')->nullable()->change();;
            $table->string('ship_address1')->nullable()->change();;
            $table->string('ship_address2')->nullable()->change();;
            $table->string('ship_city')->nullable()->change();;
            $table->string('ship_province')->nullable()->change();;
            $table->string('ship_postal_code')->nullable()->change();;
            $table->string('contact_email')->nullable()->change();;
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
            //
        });
    }
}
