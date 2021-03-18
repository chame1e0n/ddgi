<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLisingProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lising_product', function (Blueprint $table) {
            $table->id();
            $table->text('client_type_radio')->nullable();
            $table->text('fio_insurer')->nullable();
            $table->text('address_insurer')->nullable();
            $table->text('tel_insurer')->nullable();
            $table->text('address_schet')->nullable();
            $table->text('inn_insurer')->nullable();
            $table->text('mfo_insurer')->nullable();
            $table->text('bank_insurer')->nullable();
            $table->text('okonh_insurer')->nullable();
            $table->text('fio_beneficiary')->nullable();
            $table->text('address_beneficiary')->nullable();
            $table->text('tel_beneficiary')->nullable();
            $table->text('beneficiary_schet')->nullable();
            $table->text('inn_beneficiary')->nullable();
            $table->text('mfo_beneficiary')->nullable();
            $table->text('bank_beneficiary')->nullable();
            $table->text('okonh_beneficiary')->nullable();
            $table->text('dogovor_lizing_num')->nullable();
            $table->date('insurance_from')->nullable();
            $table->date('insurance_to')->nullable();
            $table->text('geo_zone')->nullable();
            $table->text('polis_series_0')->nullable();
            $table->text('polis_mark_0')->nullable();
            $table->text('polis_model_0')->nullable();
            $table->text('polis_modification_0')->nullable();
            $table->text('polis_gos_num_0')->nullable();
            $table->text('polis_teh_passport_0')->nullable();
            $table->text('polis_num_engine_0')->nullable();
            $table->text('polis_num_body_0')->nullable();
            $table->text('polis_payload_0')->nullable();
            $table->text('polis_places_0')->nullable();
            $table->text('overall_polis_sum_0')->nullable();
            $table->text('polis_premium_0')->nullable();
            $table->text('mark_model')->nullable();
            $table->text('name')->nullable();
            $table->text('series_number')->nullable();
            $table->text('insurance_sum')->nullable();
            $table->text('total')->nullable();
            $table->text('cover_terror_attacks_sum')->nullable();
            $table->text('cover_terror_attacks_currency')->nullable();
            $table->text('cover_terror_attacks_insured_sum')->nullable();
            $table->text('cover_terror_attacks_insured_currency')->nullable();
            $table->text('coverage_evacuation_cost')->nullable();
            $table->text('coverage_evacuation_currency')->nullable();
            $table->text('strtahovka_0')->nullable();
            $table->text('other_insurance_info')->nullable();
            $table->text('vehicle_damage')->nullable();
            $table->text('one_sum')->nullable();
            $table->text('one_premia')->nullable();
            $table->text('one_franshiza')->nullable();
            $table->text('civil_liability')->nullable();
            $table->text('tho_sum')->nullable();
            $table->text('two_preim')->nullable();
            $table->text('accidents')->nullable();
            $table->text('driver_quantity')->nullable();
            $table->text('driver_one_sum')->nullable();
            $table->text('driver_currency')->nullable();
            $table->text('driver_total_sum')->nullable();
            $table->text('driver_preim_sum')->nullable();
            $table->text('passenger_quantity')->nullable();
            $table->text('passenger_one_sum')->nullable();
            $table->text('passenger_currency')->nullable();
            $table->text('passenger_total_sum')->nullable();
            $table->text('passenger_preim_sum')->nullable();
            $table->text('limit_quantity')->nullable();
            $table->text('limit_one_sum')->nullable();
            $table->text('limit_currency')->nullable();
            $table->text('limit_total_sum')->nullable();
            $table->text('limit_preim_sum')->nullable();
            $table->text('total_liability_limit_0')->nullable();
            $table->text('total_liability_limit_currency_0')->nullable();
            $table->text('policy')->nullable();
            $table->date('from_date')->nullable();
            $table->text('agent')->nullable();
            $table->text('payment')->nullable();
            $table->text('payment_order')->nullable();
            $table->text('insurance_premium_currency')->nullable();
            $table->text('payment_term')->nullable();
            $table->text('payment_sum_0_0')->nullable();
            $table->text('payment_from_0_0')->nullable();
            $table->text('polis_series')->nullable();
            $table->text('litso')->nullable();
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
        Schema::dropIfExists('lising_product');
    }
}
