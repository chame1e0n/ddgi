<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeshchastka24timeInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neshchastka24time_information', function (Blueprint $table) {
            $table->id();
            $table->integer('neshchastka24_time_id');
            $table->integer('polis_id');
            $table->integer('agents');
            $table->string('period_polis');
            $table->string('polis_agent');
            $table->string('polis_model');
            $table->string('polis_modification');
            $table->string('polis_teh_passport');
            $table->string('polis_num_engine');


            $table->string('polis_num_body');
            $table->string('polis_payload');
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
        Schema::dropIfExists('neshchastka24time_information');
    }
}
