<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('departure_date');
            $table->unsignedBigInteger('vehicleType_id');
            $table->unsignedBigInteger('route_id');
            $table->float('price', 10, 2);
            $table->integer('available_seats');
            $table->text('allocated_seats');
            $table->boolean('status')->nullable();
            $table->foreign('route_id')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('vehicleType_id')->references('id')->on('vehicle_type')->onDelete('cascade');
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
        Schema::dropIfExists('trips');
    }
}
