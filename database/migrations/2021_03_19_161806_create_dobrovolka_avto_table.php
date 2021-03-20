<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDobrovolkaAvtoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dobrovolka_avto', function (Blueprint $table) {
            $table->id();
            $table->string('period_insurance_from')->nullable();
            $table->string('period_insurance_to')->nullable();
            $table->integer('ispolzovaniya_TS_na_osnovanii')->nullable();
            $table->string('geograficheskaya_zona')->nullable();
            $table->integer('defects')->nullable();
            $table->text('defects_images')->nullable();
            $table->string('cel_ispolzovaniya')->nullable();
            $table->string('valyuta')->nullable();
            $table->string('poryadok_oplaty_premii')->nullable();
            $table->integer('sposob_rascheta')->nullable();
            $table->string('strahovaya_summa')->nullable();

            $table->string('strahovaya_premiya')->nullable();
            $table->string('franshiza')->nullable();
            $table->string('anketa')->nullable();
            $table->string('dogovor')->nullable();
            $table->string('polis')->nullable();

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
        Schema::dropIfExists('dobrovolka_avto');
    }
}
