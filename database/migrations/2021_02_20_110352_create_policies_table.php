<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->references('id')->on('properties')->onDelete('cascade');
            $table->tinyInteger('advance_cancellation');
            $table->string('full_pay');
            $table->string('protection');
            $table->string('checkin_from');
            $table->string('checkin_to');
            $table->string('checkout_from');
            $table->string('checkout_to');
            $table->string('children');
            $table->string('pets_allowed');
            $table->string('pets_fee');
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
        Schema::dropIfExists('policies');
    }
}
