<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('property_id')->references('id')->on('properties')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('staff', 3, 2);
            $table->decimal('comfort', 3, 2);
            $table->decimal('cleanliness', 3, 2);
            $table->decimal('location', 3, 2);
            $table->decimal('facilities', 3, 2);
            $table->decimal('vfm', 3, 2);
            $table->decimal('osr', 3, 2)->nullable();
            $table->decimal('wifi', 3, 2)->nullable();
            $table->decimal('breakfast', 3, 2)->nullable();
            $table->decimal('rs', 3, 2)->nullable();
            $table->decimal('rv', 3, 2)->nullable();
            $table->decimal('br', 3, 2)->nullable();
            $table->decimal('coffee', 3, 2)->nullable();
            $table->text('review')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
