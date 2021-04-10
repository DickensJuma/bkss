<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatePlanRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_plan_room', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rate_plan_id')->references('id')->on('rate_plans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');  
            $table->unique(['room_id', 'rate_plan_id'], 'plan');
            $table->decimal('amount', 5, 2);
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
        Schema::dropIfExists('rate_plan_room');
    }
}
