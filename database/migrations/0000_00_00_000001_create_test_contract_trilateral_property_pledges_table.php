<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractTrilateralPropertyPledgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_trilateral_property_pledges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('between_agreement_number', 45);
            $table->date('between_agreement_date');
            $table->string('evaluation_basis', 45);
            $table->string('fire_certificate')->nullable();
            $table->string('security_certificate')->nullable();
            $table->float('franchise_earthquake_fire_percent', 6, 3)->unsigned();
            $table->float('franchise_illegal_action_percent', 6, 3)->unsigned();
            $table->float('franchise_other_risks_percent', 6, 3)->unsigned();
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
        Schema::dropIfExists('contract_trilateral_property_pledges');
    }
}
