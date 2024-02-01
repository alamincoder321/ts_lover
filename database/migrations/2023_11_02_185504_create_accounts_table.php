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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('username');
            $table->string('image')->nullable();
            $table->string('package_name');
            $table->integer('package_coin');
            $table->integer('package_days');
            $table->float('package_interest');
            $table->double('limit_gain_coin');
            $table->double('total_gain_coin');
            $table->double('last_day_gain_coin');
            $table->double('have_days');
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
        Schema::dropIfExists('accounts');
    }
};
