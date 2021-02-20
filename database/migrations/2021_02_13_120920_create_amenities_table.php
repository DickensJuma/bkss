<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class CreateAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('p_id');
            $table->boolean('extra_beds');
            $table->tinyInteger('extrabeds_no')->default(0);
            $table->text('extra_accomodation')->nullable();
            $table->integer('child_cost')->unsigned()->nullable();
            $table->integer('extra_child_max_age')->nullable();
            $table->integer('extra_child_cost')->unsigned()->nullable(); 
            $table->integer('extra_adult_cost')->unsigned()->nullable();  
            $table->text('common_amenities')->nullable(); 
            $table->text('room_amenities')->nullable();        
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
        Schema::dropIfExists('amenities');
    }
}
