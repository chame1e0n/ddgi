<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaskoPolicyInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('kasko_policy_informations');
        Schema::create('kasko_policy_informations', function (Blueprint $table) {
            $table->id();
            $table->string('polis_number');
            $table->string('polis_god_vupyska');
            $table->string('polis_date_from');
            $table->string('polis_date_to');
            $table->string('polis_marka');
            $table->string('polis_model');
            $table->string('polis_gos_nomer');
            $table->string('polis_nomer_tex_passporta');
            $table->string('polis_nomer_dvigatelya');
            $table->string('polis_nomer_kuzova');
            $table->string('polis_gruzopodoemnost');
            $table->string('polis_strah_value');
            $table->string('polis_strah_sum');
            $table->string('polis_strah_premia');
            $table->string('mark_model');
            $table->string('name');
            $table->string('series_number');
            $table->string('insurance_sum');
            $table->string('cover_terror_attacks_sum');
            $table->string('cover_terror_attacks_currency');
            $table->string('cover_terror_attacks_insured_sum');
            $table->string('cover_terror_attacks_insured_currency');
            $table->string('coverage_evacuation_cost');
            $table->string('coverage_evacuation_currency');
            $table->string('other_insurance_info')->nullable();
            $table->string('one_sum')->nullable();
            $table->string('one_premia')->nullable();
            $table->string('one_franshiza')->nullable();
            $table->string('tho_sum')->nullable();
            $table->string('two_preim')->nullable();
            $table->string('driver_quantity')->nullable();
            $table->string('driver_one_sum')->nullable();
            $table->string('driver_currency')->nullable();
            $table->string('driver_total_sum')->nullable();
            $table->string('driver_preim_sum')->nullable();
            $table->string('passenger_quantity')->nullable();
            $table->string('passenger_one_sum')->nullable();
            $table->string('passenger_currency')->nullable();
            $table->string('passenger_total_sum')->nullable();
            $table->string('limit_quantity')->nullable();
            $table->string('limit_one_sum')->nullable();
            $table->string('limit_currency')->nullable();
            $table->string('limit_total_sum')->nullable();
            $table->string('limit_preim_sum')->nullable();
            $table->string('total_liability_limit');
            $table->string('total_liability_limit_currency');
            $table->date('from_date');
            $table->integer('policy_id');
            $table->integer('agent_id');
            $table->string('payment');
            $table->string('payment_order');
            $table->string('overall_sum')->nullable();
            $table->integer('policy_series_id');
            $table->integer('policy_agent_id');
            $table->integer('kasko_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasko_policy_informations');
    }
}
