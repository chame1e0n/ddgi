<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractPropertyLeasingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_property_leasings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned();
            $table->string('agreement_number')->nullable();
            $table->string('geo_zone', 45);
            $table->float('insured_sum_for_closed_warehouse', 12, 3)->unsigned()->nullable();
            $table->float('insured_sum_for_opened_warehouse', 12, 3)->unsigned()->nullable();
            $table->float('franchise_earthquake_fire_percent', 6, 3)->unsigned()->nullable();
            $table->float('franchise_illegal_action_percent', 6, 3)->unsigned()->nullable();
            $table->float('franchise_other_risks_percent', 6, 3)->unsigned()->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('property_id', 'fk_contract_property_leasing_property')->references('id')->on('properties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_property_leasings');
    }
}
