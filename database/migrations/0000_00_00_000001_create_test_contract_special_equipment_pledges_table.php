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
            $table->string('pledge_agreement_number', 45);
            $table->date('pledge_agreement_from');
            $table->date('pledge_agreement_to');
            $table->string('estimation_basement', 45);
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
        Schema::dropIfExists('contract_special_equipment_pledges');
    }
}
