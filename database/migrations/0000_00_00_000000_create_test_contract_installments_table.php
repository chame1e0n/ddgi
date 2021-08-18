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
            $table->float('sum', 32, 2)->unsigned()->nullable();
            $table->float('loss_sum', 32, 2)->unsigned()->nullable();
            $table->float('loss_tariff', 32, 2)->unsigned()->nullable();
            $table->float('loss_premium', 32, 2)->unsigned()->nullable();
            $table->float('loss_franchise', 32, 2)->unsigned()->nullable();
            $table->float('risk_sum', 32, 2)->unsigned()->nullable();
            $table->float('risk_tariff', 32, 2)->unsigned()->nullable();
            $table->float('risk_premium', 32, 2)->unsigned()->nullable();
            $table->float('risk_franchise', 32, 2)->unsigned()->nullable();
            $table->float('franchise_earthquake_fire_percent', 4, 2)->unsigned();
            $table->float('franchise_illegal_action_percent', 4, 2)->unsigned();
            $table->float('franchise_other_risks_percent', 4, 2)->unsigned();
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
