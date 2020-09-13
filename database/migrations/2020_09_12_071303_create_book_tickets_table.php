<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('vehicleType');
            $table->string('route');
//            $table->unsignedBigInteger('trip_id');
            $table->string('seat');
            $table->integer('passengers');
            $table->integer('children');
            $table->integer('special');
            $table->integer('price')->default(0);
            $table->string('email');
            $table->string('pickup');
            $table->string('drop');
            $table->boolean('status')->nullable();
            $table->timestamps();

//            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_tickets');
    }
}
