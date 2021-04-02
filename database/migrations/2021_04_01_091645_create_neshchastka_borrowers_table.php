<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeshchastkaBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neshchastka_borrowers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("policy_holder_id");
            $table->unsignedBigInteger("policy_beneficiaries_id");
            $table->string("fio_insured")->nullable();
            $table->string("address_insured")->nullable();
            $table->string("tel_insured")->nullable();
            $table->string("passport_series_insured")->nullable();
            $table->string("passport_num_insured")->nullable();
            $table->string("credit_contract")->nullable();
            $table->date("credit_contract_to")->nullable();
            $table->date("insurance_from")->nullable();
            $table->date("insurance_to")->nullable();
            $table->string("tariff")->nullable();
            $table->string("percent_of_tariff")->nullable();
            $table->string("insurance_sum")->nullable();
            $table->string("insurance_bonus")->nullable();
            $table->string("franchise")->nullable();
            $table->string("insurance_premium_currency")->nullable();
            $table->string("payment_term")->nullable();
            $table->string("way_of_calculation")->nullable();
            $table->string("payment_sum_main")->nullable();
            $table->string("payment_from_main")->nullable();
            $table->string("policy_series")->nullable();
            $table->date("policy_insurance_from")->nullable();
            $table->string("person")->nullable();
            $table->string("application_form_file")->nullable();
            $table->string("contract_file")->nullable();
            $table->string("policy_file")->nullable();
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
        Schema::dropIfExists('neshchastka_borrowers');
    }
}
