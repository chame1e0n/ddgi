<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPolicyLeasingAutocreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_leasing_autocredits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('issue_year')->unsigned();
            $table->string('brand', 100);
            $table->string('model', 100);
            $table->string('government_number', 45);
            $table->string('techpassport_number', 45);
            $table->string('engine_number', 45);
            $table->string('carcase_number', 45);
            $table->float('insurance_value', 32, 2)->unsigned();
            $table->string('ae_modification_brand', 250)->nullable();
            $table->string('ae_equipment_identification', 100)->nullable();
            $table->string('ae_serial_number', 45)->nullable();
            $table->float('ae_additional_insured_sum', 32, 2)->unsigned()->nullable();
            $table->float('ac_terrorist_attack_for_car', 32, 2)->unsigned()->nullable();
            $table->float('ac_terrorist_attack_for_human', 32, 2)->unsigned()->nullable();
            $table->float('ac_terrorist_attack_evacuation', 32, 2)->unsigned()->nullable();
            $table->string('vi_previous_insurance_info')->nullable();
            $table->float('ec_vehicle_death_recovery_sum', 32, 2)->unsigned()->nullable();
            $table->float('ec_vehicle_death_recovery_premium', 32, 2)->unsigned()->nullable();
            $table->float('ec_vehicle_death_recovery_franchise', 32, 2)->unsigned()->nullable();
            $table->float('ec_civil_liability_sum', 32, 2)->unsigned()->nullable();
            $table->float('ec_civil_liability_premium', 32, 2)->unsigned()->nullable();
            $table->float('ec_driver_sum_for_person', 32, 2)->unsigned()->nullable();
            $table->float('ec_driver_premium', 32, 2)->unsigned()->nullable();
            $table->integer('ec_passenger_amount')->unsigned()->nullable();
            $table->float('ec_passenger_sum_for_person', 32, 2)->unsigned()->nullable();
            $table->float('ec_passenger_premium', 32, 2)->unsigned()->nullable();
            $table->integer('ec_general_limit_amount')->unsigned()->nullable();
            $table->float('ec_general_limit_sum_for_person', 32, 2)->unsigned()->nullable();
            $table->float('ec_general_limit_premium', 32, 2)->unsigned()->nullable();
            $table->float('ec_general_limit_responsibility', 32, 2)->unsigned()->nullable();
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
        Schema::dropIfExists('policy_leasing_autocredits');
    }
}
