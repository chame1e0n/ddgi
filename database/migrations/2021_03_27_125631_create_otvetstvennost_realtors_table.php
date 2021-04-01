<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtvetstvennostRealtorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otvetstvennost_realtors', function (Blueprint $table) {
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

            $table->string('sfera_deyatelnosti')->nullable();
            $table->string('limit_otvetstvennosti');
            $table->text('documents')->nullable();

            $table->string('insurance_premium_currency');
            $table->string('poryadok_oplaty_premii');

            $table->string('strahovaya_sum');
            $table->string('strahovaya_purpose');
            $table->string('franshiza');

            $table->string('serial_number_policy');
            $table->date('date_issue_policy');
            $table->integer('otvet_litso');

            $table->date('activity_period_from')->nullable();
            $table->date('activity_period_to')->nullable();
            $table->string('activity_period_all')->nullable();

            $table->boolean('acted')->default(false);
            $table->text('public_sector_comment')->nullable();
            $table->text('private_sector_comment')->nullable();


            $table->boolean('cases')->default(false);
            $table->text('reason_case')->nullable();

            $table->boolean('administrative_case')->default(false);
            $table->text('reason_administrative_case')->nullable();

            $table->string('prof_riski')->nullable();
            $table->string('anketa')->nullable();
            $table->string('dogovor')->nullable();
            $table->string('polis')->nullable();
            $table->integer('policy_holder_id');
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
        Schema::dropIfExists('otvetstvennost_realtors');
    }
}
