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
            $table->tinyInteger('owner');
            $table->tinyInteger('type')->default(1);
            $table->string('logo')->default('default.png');
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
