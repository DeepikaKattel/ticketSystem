<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reg_number');
            $table->string('name');
            $table->unsignedBigInteger('vehicleType_id');
            $table->foreign('vehicleType_id')->references('id')->on('vehicle_type')->onDelete('cascade');
            $table->string('engine');
            $table->string('chassis');
            $table->string('model');
            $table->string('owner_name');
            $table->string('owner_number');
            $table->string('brand_name');
            $table->boolean('status')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
