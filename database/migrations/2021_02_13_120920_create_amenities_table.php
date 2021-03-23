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
            $table->foreignId('sub_cat_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade'); 
            $table->tinyInteger('p_id');
            $table->boolean('extra_beds');
            $table->tinyInteger('extrabeds_no')->default(0);
            $table->text('extra_accomodation')->nullable();
            $table->decimal('child_in_crib_cost', 6,2)->default(0.00);
            $table->integer('extra_child_max_age')->nullable();
            $table->decimal('extra_child_cost' , 6,2)->unsigned()->nullable(); 
            $table->decimal('extra_adult_cost' , 6,2)->unsigned()->nullable();  
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
