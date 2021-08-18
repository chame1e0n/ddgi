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
            $table->string('geo_zone', 45);
            $table->float('insured_sum_for_closed_warehouse', 32, 2)->unsigned()->nullable();
            $table->float('insured_sum_for_opened_warehouse', 32, 2)->unsigned()->nullable();
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
        Schema::dropIfExists('contract_property_leasings');
    }
}
