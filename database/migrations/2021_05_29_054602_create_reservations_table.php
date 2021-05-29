<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->references('id')->on('properties')->onDelete('cascade')->onUpdate('cascade');  
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');  
            $table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');  
            $table->smallInteger('quantity');
            $table->date('booked_from')->default(date("Y-m-d"));
            $table->date('booked_to')->default(date("Y-m-d"));
            $table->decimal('amount', 5, 2);
            $table->smallInteger('status')->default('1');
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
        Schema::dropIfExists('reservations');
    }
}
