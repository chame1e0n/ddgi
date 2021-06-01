<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractSpecialEquipmentPledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_special_equipment_pledges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned();
            $table->string('pledge_agreement_number', 45);
            $table->date('pledge_agreement_from');
            $table->date('pledge_agreement_to');
            $table->string('agreement_number', 45);
            $table->date('agreement_from');
            $table->date('agreement_to');
            $table->date('insurance_period_from');
            $table->date('insurance_period_to');
            $table->string('estimation_basement', 45);
            $table->string('fire_sertificate_path')->nullable();
            $table->string('security_sertificate_path')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('property_id', 'fk_contract_special_equipment_pledge_property')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_special_equipment_pledges');
    }
}
