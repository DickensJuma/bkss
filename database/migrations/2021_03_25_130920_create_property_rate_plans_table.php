<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyRatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_rate_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('p_id')->references('id')->on('properties')->onDelete('cascade')->onUpdate('cascade');  
            $table->foreignId('r_id')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');  
            $table->foreignId('rate_plan_id')->references('id')->on('rate_plans')->onDelete('cascade')->onUpdate('cascade'); 
            $table->unique(['p_id', 'r_id', 'rate_plan_id'], 'plan');
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
        Schema::dropIfExists('property_rate_plans');
    }
}
