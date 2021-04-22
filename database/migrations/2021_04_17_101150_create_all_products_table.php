<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("policy_holder_id")->nullable();
            $table->unsignedBigInteger("policy_beneficiaries_id")->nullable();
            $table->unsignedBigInteger("zaemshik_id")->nullable();
            $table->foreign('zaemshik_id')
                ->references('id')->on('zaemshiks');
            $table->string('fio_insured')->nullable();
            $table->string('address_insured')->nullable();
            $table->string("tel_insured")->nullable();
            $table->string("passport_series_insured")->nullable();
            $table->string("passport_num_insured")->nullable();
            $table->string("credit_contract")->nullable();
            $table->date("credit_contract_to")->nullable();
            $table->date("insurance_from")->nullable();
            $table->date("insurance_to")->nullable();
            $table->string('sum_of_insurance')->nullable();
            $table->string('bonus')->nullable();
            $table->string('tariff')->nullable();
            $table->string('percent_of_tariff')->nullable();
            $table->string('insurance_sum')->nullable();
            $table->string('insurance_bonus')->nullable();
            $table->string('franchise')->nullable();
            $table->string('insurance_premium_currency')->nullable();
            $table->string('payment_term')->nullable();
            $table->string('payment_sum_main')->nullable();
            $table->string('payment_from_main')->nullable();
            $table->string('way_of_calculation')->nullable();
            $table->string("policy_series")->nullable();
            $table->date("policy_insurance_from")->nullable();
            $table->string("person")->nullable();
            $table->string("application_form_file")->nullable();
            $table->string("contract_file")->nullable();
            $table->string("policy_file")->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->string('comments')->nullable();
            $table->string('dogovor_lizing_num')->nullable();
            $table->string('insurance_aim')->nullable();
            $table->string('currency')->nullable();
            $table->date('object_from_date')->nullable();
            $table->date('object_to_date')->nullable();
            $table->string('other_info')->nullable();
            $table->string('insurance_total_sum')->nullable();
            $table->string('insurance_gift')->nullable();
            $table->string("payment_currency")->nullable();
            $table->string("polis_series")->nullable();
            $table->date("polis_from")->nullable();
            $table->string("litso")->nullable();
            $table->string("passport_copy")->nullable();
            $table->string("dogovor_copy")->nullable();
            $table->string("spravka_copy")->nullable();
            $table->string("other")->nullable();
            $table->string('file')->nullable();
            $table->string('policy_id')->nullable();
            $table->string('policy_series_id')->nullable();
            $table->string('state')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_products');
    }
}
