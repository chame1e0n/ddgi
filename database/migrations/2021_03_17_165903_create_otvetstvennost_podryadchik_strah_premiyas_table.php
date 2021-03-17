<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtvetstvennostPodryadchikStrahPremiyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otvetstvennost_podryadchik_strah_premiyas', function (Blueprint $table) {
            $table->id();
            $table->string('prem_sum');
            $table->date('prem_from');
            $table->integer('otvetstvennost_podryadchik_id');
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
        Schema::dropIfExists('otvetstvennost_podryadchik_strah_premiyas');
    }
}
