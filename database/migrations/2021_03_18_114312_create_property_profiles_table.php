<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('p_id')->references('id')->on('properties')->onDelete('cascade')->onUpdate('cascade');            
            $table->integer('profile_type')->unsigned();
            $table->string('name');
            $table->text('about')->nullable();
            $table->text('about2')->nullable();
            $table->text('neighborhood')->nullable();
            $table->string('open_date', 100)->nullable();
            $table->string('construction_year', 100)->nullable();
            $table->string('renovation_year', 100)->nullable();
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
        Schema::dropIfExists('property_profiles');
    }
}
