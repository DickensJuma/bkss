<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('property');
            $table->tinyInteger('type');
            $table->string('name');
            $table->tinyInteger('s_policy');
            $table->tinyInteger('quantity')->default(1);
            $table->tinyInteger('bed');
            $table->Integer('capacity');
            $table->tinyInteger('child')->default(0);
            $table->Integer('normal_charge');
            $table->Integer('offer_charge')->default(0);
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
        Schema::dropIfExists('rooms');
    }
}
