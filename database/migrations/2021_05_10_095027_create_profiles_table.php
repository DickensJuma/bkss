<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('p_id');
            $table->smallInteger('type');
            $table->string('name');
            $table->text('property_descr')->nullable();
            $table->text('host_descr')->nullable();
            $table->text('neigh_descr')->nullable();
            $table->smallInteger('month_open')->nullable();
            $table->smallInteger('year_open')->nullable();
            $table->smallInteger('month_renovated')->nullable();
            $table->smallInteger('year_renovated')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
