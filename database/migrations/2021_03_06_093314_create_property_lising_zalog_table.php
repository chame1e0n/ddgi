<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyLisingZalogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_lising_zalog', function (Blueprint $table) {
            $table->id();
            $table->text('client_type_radio')->nullable();
            $table->text('product_id')->nullable();
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
            $table->text('overall_polis_sum_0')->nullable();
            $table->text('polis_premium_0')->nullable();
            $table->text('cover_terror_attacks_currency')->nullable();
            $table->text('cover_terror_attacks_insured_currency')->nullable();
            $table->text('coverage_evacuation_currency')->nullable();
            $table->text('driver_quantity')->nullable();
            $table->text('driver_currency')->nullable();
            $table->text('passenger_currency')->nullable();
            $table->text('limit_currency')->nullable();
            $table->text('total_liability_limit_currency_0')->nullable();
            $table->text('agent')->nullable();
            $table->text('payment')->nullable();
            $table->text('payment_order')->nullable();
            $table->text('payment_term')->nullable();
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
        Schema::dropIfExists('property_lising_zalog');
    }
}
