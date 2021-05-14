<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covids', function (Blueprint $table) {
            $table->id();
            $table->date('insurance_from');
            $table->date('insurance_to');

            $table->string('strahovaya_sum');
            $table->string('strahovaya_purpose');
            $table->string('franshiza');

            $table->string('currencies');
            $table->string('poryadok_oplaty_premii');
            $table->integer('sposob_rascheta');

            $table->string('serial_number_policy');
            $table->date('date_issue_policy');
            $table->integer('otvet_litso');

            $table->string('anketa_img')->nullable();
            $table->string('dogovor_img')->nullable();
            $table->string('polis_img')->nullable();

            $table->integer('policy_holder_id');
            $table->integer('policy_beneficiary_id');
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
        Schema::dropIfExists('covids');
    }
}
