<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractCreditLeasingRepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_credit_leasing_repayments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loan_agreement');
            $table->date('period_from');
            $table->date('period_to');
            $table->float('sum', 12, 3)->unsigned();
            $table->string('purpose');
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
        Schema::dropIfExists('contract_credit_leasing_repayments');
    }
}
