<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beneficiary_id')->unsigned()->nullable();
            $table->integer('borrower_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned();
            $table->integer('currency_id')->unsigned()->nullable();
            $table->integer('customer_id')->unsigned()->nullable();
            $table->integer('guarantor_id')->unsigned()->nullable();
            $table->integer('insured_person_id')->unsigned()->nullable();
            $table->integer('payment_method_id')->unsigned()->nullable();
            $table->integer('pledger_id')->unsigned()->nullable();
            $table->integer('principal_id')->unsigned()->nullable();
            $table->integer('specification_id')->unsigned();
            $table->string('number', 50);
            $table->enum('payment_type', ['entirely', 'tranche'])->nullable();
            $table->enum('type', ['individual', 'legal']);
            $table->string('status', 45)->default('created');
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->float('tariff', 4, 2)->unsigned()->nullable();
            $table->float('premium', 32, 2)->unsigned()->nullable();
            $table->nullableMorphs('model');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('beneficiary_id', 'fk_contract_beneficiary')->references('id')->on('beneficiaries');
            $table->foreign('borrower_id', 'fk_contract_borrower')->references('id')->on('borrowers');
            $table->foreign('client_id', 'fk_contract_client')->references('id')->on('clients');
            $table->foreign('currency_id', 'fk_contract_currency')->references('id')->on('currencies');
            $table->foreign('customer_id', 'fk_contract_customer')->references('id')->on('customers');
            $table->foreign('guarantor_id', 'fk_contract_guarantor')->references('id')->on('guarantors');
            $table->foreign('insured_person_id', 'fk_contract_insured_person')->references('id')->on('insured_persons');
            $table->foreign('payment_method_id', 'fk_contract_payment_method')->references('id')->on('payment_methods');
            $table->foreign('pledger_id', 'fk_contract_pledger')->references('id')->on('pledgers');
            $table->foreign('principal_id', 'fk_contract_principal')->references('id')->on('principals');
            $table->foreign('specification_id', 'fk_contract_specification')->references('id')->on('specifications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
