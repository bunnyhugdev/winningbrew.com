<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompetitionFinanicals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competitions', function (Blueprint $table) {
            $table->decimal('cost_per_entry', 5, 2)->default(0.0);
            $table->string('paypal_client_id')->nullable();
            $table->string('paypal_secret')->nullable();
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
            $table->dropColumn('cost_per_entry');
            $table->dropColumn('paypal_client_id');
            $table->dropColumn('paypal_secret');
        });
    }
}
