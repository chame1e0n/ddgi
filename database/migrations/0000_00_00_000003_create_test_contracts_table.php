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
            $table->integer('client_id')->unsigned();
            $table->integer('beneficiary_id')->unsigned();
            $table->integer('borrower_id')->unsigned();
            $table->integer('pledger_id')->unsigned();
            $table->integer('specification_id')->unsigned();
            $table->integer('currency_id')->unsigned();
            $table->integer('payment_method_id')->unsigned()->nullable();
            $table->enum('payment_type', ['entirely', 'tranche'])->nullable();
            $table->enum('type', ['individual', 'legal'])->nullable();
            $table->string('status', 45)->default('created');
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->integer('tarif')->unsigned()->nullable();
            $table->float('insurance_premium', 12, 3)->nullable();
            $table->nullableMorphs('model');
            $table->string('file_questionary')->nullable();
            $table->string('file_agreement')->nullable();
            $table->string('file_policy')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('beneficiary_id', 'fk_contract_beneficiary')->references('id')->on('beneficiaries');
            $table->foreign('borrower_id', 'fk_contract_borrower')->references('id')->on('borrowers');
            $table->foreign('client_id', 'fk_contract_client')->references('id')->on('clients');
            $table->foreign('currency_id', 'fk_contract_currency')->references('id')->on('currencies');
            $table->foreign('payment_method_id', 'fk_contract_payment_method')->references('id')->on('payment_methods');
            $table->foreign('pledger_id', 'fk_contract_pledger')->references('id')->on('pledgers');
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
