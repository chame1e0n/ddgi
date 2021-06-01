<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractTrilateralCarDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_trilateral_car_deposits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('insurance_agreement_number', 45);
            $table->date('insurance_agreement_date');
            $table->string('credit_agreement_number', 45);
            $table->date('credit_agreement_date');
            $table->date('credit_period_from');
            $table->date('credit_period_to');
            $table->date('period_from');
            $table->date('period_to');
            $table->string('fire_certificate_path')->nullable();
            $table->string('security_certificate_path')->nullable();
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
        Schema::dropIfExists('contract_trilateral_car_deposits');
    }
}
