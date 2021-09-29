<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PowerUnitType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('POWER_UNIT_TYPE', function (Blueprint $table) {
            $table->increments('ID_POWER_UNIT_TYPE');
            $table->string('POWER_UNIT_TYPE_XID', '150')->nullable(false);
            $table->text('DESCRIPTION')->nullable(false);
            $table->integer('INSERT_USER')->nullable(false);
            $table->date('INSERT_DATE')->nullable(false);
            $table->integer('UPDATE_USER')->nullable(false);
            $table->date('UPDATE_DATE')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
