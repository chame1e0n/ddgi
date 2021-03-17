<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditFinRiskNepogashenCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credit_fin_risk_nepogashen_credits', function (Blueprint $table) {
            $table->id();
            $table->string('dogovor_lizing_num')->comment('Кредитный договор');
            $table->date('insurance_from')->comment('Срок кредитования С');
            $table->date('insurance_to')->comment('Срок кредитования До');
            $table->string('credit_sum');
            $table->text('credit_purpose')->nullable()->comment('Цель получения кредита');
            $table->date('date_issue_policy')->nullable()->comment('Срок действия договора');
            $table->text('other_forms');
            $table->string('total_sum')->nullable();
            $table->string('total_award')->nullable();
            $table->string('payment_terms')->nullable()->comment('Условия оплаты');
            $table->string('serial_number_policy')->nullable();
            $table->date('data_delivery_policy')->comment('Дата выдачи страхового полиса');
            $table->integer('policy_holder_id')->index();
            $table->integer('agent_id')->index();
            $table->integer('zaemshik_id')->index();
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
        Schema::dropIfExists('credit_fin_risk_nepogashen_credits');
    }
}
