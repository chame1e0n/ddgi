<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPolicyConstructionInstallationWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_construction_installation_works', function (Blueprint $table) {
            $table->increments('id');
            $table->float('construction_installation_price', 32, 2)->unsigned();
            $table->float('construction_price', 32, 2)->unsigned();
            $table->float('equipment_price', 32, 2)->unsigned();
            $table->float('machine_price', 32, 2)->unsigned();
            $table->float('clear_location_price', 32, 2)->unsigned();
            $table->float('insurance_value', 32, 2)->unsigned();
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
        Schema::dropIfExists('policy_construction_installation_works');
    }
}
