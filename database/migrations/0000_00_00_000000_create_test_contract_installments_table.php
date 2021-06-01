<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_installments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loan_agreement');
            $table->date('period_from');
            $table->date('period_to');
            $table->float('sum', 12, 3)->unsigned()->nullable();
            $table->float('loss_sum', 12, 3)->unsigned()->nullable();
            $table->float('loss_tariff', 12, 3)->unsigned()->nullable();
            $table->float('loss_premium', 12, 3)->unsigned()->nullable();
            $table->float('loss_franchise', 12, 3)->unsigned()->nullable();
            $table->float('risk_sum', 12, 3)->unsigned()->nullable();
            $table->float('risk_tariff', 12, 3)->unsigned()->nullable();
            $table->float('risk_premium', 12, 3)->unsigned()->nullable();
            $table->float('risk_franchise', 12, 3)->unsigned()->nullable();
            $table->float('franchise_earthquake_fire_percent', 6, 3)->unsigned()->nullable();
            $table->float('franchise_illegal_action_percent', 6, 3)->unsigned()->nullable();
            $table->float('franchise_other_risks_percent', 6, 3)->unsigned()->nullable();
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
        Schema::dropIfExists('contract_installments');
    }
}
