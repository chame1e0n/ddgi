<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeshchastka24TimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neshchastka24_times', function (Blueprint $table) {
            $table->id();
            $table->date('insurance_from');
            $table->date('insurance_to');
            $table->string('strah_sum');
            $table->string('strah_prem');
            $table->string('franshiza');
            $table->string('insurance_premium_currency');
            $table->string('payment_term');
            $table->string('sposob_rascheta');
            $table->string('polis_series');
            $table->string('geo_zone');
            $table->date('data_vidachi_polisa');
            $table->integer('otvet_litso');
            $table->string('anketa')->nullable();
            $table->string('dogovor')->nullable();
            $table->string('polis')->nullable();
            $table->integer('policy_holder_id');
            $table->integer('policy_beneficiary_id');
            $table->timestamps();
        });
        Schema::create('neshchastka24_times_strah_premiya', function (Blueprint $table) {
            $table->id();
            $table->integer('neshchastka24_time_id');
            $table->string('payment_sum');
            $table->date('payment_from');
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
        Schema::dropIfExists('neshchastka24_times');
        Schema::dropIfExists('neshchastka24_times_strah_premiya');
    }
}
