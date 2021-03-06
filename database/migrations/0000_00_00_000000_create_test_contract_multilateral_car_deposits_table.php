<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractMultilateralCarDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_multilateral_car_deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('insurance_agreement_number', 45);
            $table->date('insurance_agreement_date');
            $table->string('credit_agreement_number', 45);
            $table->date('credit_period_from');
            $table->date('credit_period_to');
            $table->string('geo_zone', 45);
            $table->string('purpose', 45);
            $table->string('overview_comment', 45)->nullable();
            $table->string('insurance_comment', 45)->nullable();
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
        Schema::dropIfExists('contract_multilateral_car_deposits');
    }
}
