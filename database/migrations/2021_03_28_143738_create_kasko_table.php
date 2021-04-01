<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaskoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('kasko');
        Schema::create('kasko', function (Blueprint $table) {
            $table->id();
            $table->date('insurance_from');
            $table->date('insurance_to');
            $table->string('reason');
            $table->string('geo_zone');
            $table->string('strahovaya_sum');
            $table->string('strahovaya_purpose');
            $table->string('franshiza');
            $table->string('insurance_premium_currency');
            $table->string('payment_term');
            $table->string('sposob_rascheta');
            $table->string('polis_series');
            $table->string('insurance_from_date');
            $table->integer('policy_holder_id');
            $table->integer('policy_beneficiary_id');

            $table->integer('otvet_litso');
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
        Schema::dropIfExists('kasko');
    }
}
