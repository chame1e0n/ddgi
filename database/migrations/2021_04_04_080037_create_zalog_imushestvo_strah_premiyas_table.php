<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZalogImushestvoStrahPremiyasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zalog_imushestvo_strah_premiyas', function (Blueprint $table) {
            $table->id();
            $table->string('prem_sum');
            $table->date('prem_from');
            $table->integer('zalog_imushestvo_id');
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
        Schema::dropIfExists('zalog_imushestvo_strah_premiyas');
    }
}
