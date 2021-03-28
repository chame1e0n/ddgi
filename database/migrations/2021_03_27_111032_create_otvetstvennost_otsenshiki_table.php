<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtvetstvennostOtsenshikiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otvetstvennost_otsenshiki', function (Blueprint $table) {
            $table->id();
            $table->text('info_personal')->nullable();
            $table->date('insurance_from');
            $table->date('insurance_to');
            $table->string('geo_zone');
            $table->string('first_year')->nullable();
            $table->string('second_year')->nullable();
            $table->string('first_turnover')->nullable();
            $table->string('second_turnover')->nullable();
            $table->string('total_turnover')->nullable();
            $table->string('first_profit')->nullable();
            $table->string('second_profit')->nullable();
            $table->string('total_profit')->nullable();

            $table->string('sfera_deyatelnosti');
            $table->string('limit_otvetstvennosti');
            $table->text('documents')->nullable();

            $table->string('insurance_premium_currency');
            $table->string('poryadok_oplaty_premii');

            $table->string('strahovaya_sum')->nullable();
            $table->string('strahovaya_purpose')->nullable();
            $table->string('franshiza')->nullable();

            $table->string('serial_number_policy');
            $table->date('date_issue_policy');
            $table->integer('otvet_litso');

            $table->string('anketa')->nullable();
            $table->string('dogovor')->nullable();
            $table->string('polis')->nullable();


            $table->string('public_sector_comment')->nullable();
            $table->string('private_sector_comment')->nullable();
            $table->string('reason_case')->nullable();
            $table->string('reason_administrative_case')->nullable();
            $table->integer('policy_holder_id');
            $table->string('prof_riski');
            $table->timestamps();
        });

        Schema::create('otvetstvennost_otsenshiki_strah_premiyas', function (Blueprint $table) {
            $table->id();
            $table->string('prem_sum');
            $table->date('prem_from');
            $table->integer('otvetstvennost_otsenshiki_id');
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
        Schema::dropIfExists('otvetstvennost_otsenshiki');
        Schema::dropIfExists('otvetstvennost_otsenshiki_strah_premiyas');
    }
}
