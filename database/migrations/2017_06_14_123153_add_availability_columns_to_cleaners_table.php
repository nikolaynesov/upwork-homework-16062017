<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvailabilityColumnsToCleanersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cleaners', function (Blueprint $table) {

            $table->time("available_from")->default('00:00:00');
            $table->time("available_to")->default('24:00:00');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cleaners', function (Blueprint $table) {

            $table->dropColumn('available_from');
            $table->dropColumn('available_to');

        });
    }
}
