<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArrivalTimeToTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trips', function (Blueprint $table) {
            $table->time('arrival_time');
            $table->string('pickUp');
            $table->string('dropUp');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trips', function (Blueprint $table) {
            //
        });
    }
}
