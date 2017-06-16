<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCityCleanerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('city_cleaner', function (Blueprint $table) {

            $table->increments('id');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('cleaner_id');
            $table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('cleaner_id')->references('id')->on('cleaners')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('city_cleaner');

    }
}
