<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractConsumerCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_consumer_credits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loan_agreement');
            $table->string('insurance_agreement_number', 45);
            $table->date('insurance_agreement_date');
            $table->string('credit_agreement_number', 45);
            $table->date('credit_agreement_date');
            $table->date('credit_from');
            $table->date('credit_to');
            $table->date('validity_from');
            $table->date('validity_to');
            $table->string('collateral_type', 45);
            $table->string('purpose')->nullable();
            $table->string('description', 45);
            $table->float('collateral_sum', 12, 3)->unsigned();
            $table->string('other_security_forms')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_consumer_credits');
    }
}
