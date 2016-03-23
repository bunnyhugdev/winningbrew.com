<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdinalToJudgingMappings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('judging_category_mappings', function (Blueprint $table) {
            $table->string('ordinal')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('judging_category_mappings', function (Blueprint $table) {
            $table->dropColumn('ordinal');
        });
    }
}
