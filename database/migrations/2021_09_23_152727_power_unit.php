<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PowerUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('POWER_UNIT', function (Blueprint $table) {
            $table->increments('ID_POWER_UNIT');
            $table->string('POWER_UNIT_NUM', '100')->nullable(false);
            $table->text('DESCRIPTION')->nullable(false);
            $table->integer('ID_CORPORATION');
            $table->integer('ID_LOCATION');
            $table->integer('ID_POWER_UNIT_TYPE');
            $table->foreign('ID_CORPORATION')->references('ID_CORPORATION')->on('CORPORATION');
            $table->foreign('ID_LOCATION')->references('ID_LOCATION')->on('LOCATION');
            $table->foreign('ID_POWER_UNIT_TYPE')->references('ID_POWER_UNIT_TYPE')->on('POWER_UNIT_TYPE');
            $table->enum('IS_ACTIVE', ['Y', 'N'])->default('Y');
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
