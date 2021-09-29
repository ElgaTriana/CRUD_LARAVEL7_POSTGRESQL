<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Corporation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CORPORATION', function (Blueprint $table) {
            $table->increments('ID_CORPORATION');
            $table->string('CORPORATION_NAME', '150')->nullable(false);
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
