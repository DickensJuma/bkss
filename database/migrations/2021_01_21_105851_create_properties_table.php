<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('about')->nullable();
            $table->tinyInteger('rating');
            $table->string('contact_name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('address2')->nullable();
            $table->string('country');
            $table->string('city');
            $table->string('zip');
            $table->foreignId('owner')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreignId('admin')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');               
            $table->tinyInteger('type')->default(1);
            $table->tinyInteger('host_type')->default(0);
            $table->string('logo')->default('default.png');
            $table->tinyInteger('pms')->default(0);
            $table->tinyInteger('channel_manager')->default(0);
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('properties');
    }
}
