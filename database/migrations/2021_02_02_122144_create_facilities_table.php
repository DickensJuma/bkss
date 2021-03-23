<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_cat_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade'); 
            $table->tinyInteger('p_id');
            $table->string('parking', 100);
            $table->string('parking_type', 100)->nullable();
            $table->string('parking_loc', 100)->nullable();
            $table->string('parking_reservation', 100)->nullable();
            $table->integer('parking_fee')->nullable();
            $table->string('breakfast_availability', 100);
            $table->integer('breakfast_cost')->unsigned()->nullable();
            $table->text('breakfast_type')->nullable();
            $table->text('language');
            $table->text('facility')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facilities');
    }
}
