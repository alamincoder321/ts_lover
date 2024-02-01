<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gain_histroys', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('account_id');
            $table->double('previous_gain_coin');
            $table->double('today_gain_coin');
            $table->double('present_gain_coin'); // current gain
            $table->double('today_interest_rate'); // current gain
            $table->date('date');
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
        Schema::dropIfExists('gain_histroys');
    }
};
