<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowerSportsmanOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrower_sportsman_others', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('borrower_sportsman_id');
            $table->foreign('borrower_sportsman_id')->references('id')->on('borrower_sportsmen');
            $table->string("other_mark_model")->nullable();
            $table->string("other_name_tools")->nullable();
            $table->string("other_series_number")->nullable();
            $table->string("other_insurance_sum")->nullable();
            $table->string("other_total")->nullable();
            $table->string("other_cover_terror_attacks_sum")->nullable();
            $table->string("other_cover_terror_attacks_currency")->nullable();
            $table->string("cover_terror_attacks_insured_sum")->nullable();
            $table->string("other_cover_terror_attacks_insured_currency")->nullable();
            $table->string("other_coverage_evacuation_cost")->nullable();
            $table->string("other_coverage_evacuation_currency")->nullable();
            $table->string("other_insurance_info")->nullable();
            $table->string("one_sum")->nullable();
            $table->string("one_premia")->nullable();
            $table->string("one_franshiza")->nullable();
            $table->string("tho_sum")->nullable();
            $table->string("two_preim")->nullable();
            $table->string("driver_quantity")->nullable();
            $table->string("driver_one_sum")->nullable();
            $table->string("driver_currency")->nullable();
            $table->string("driver_total_sum")->nullable();
            $table->string("driver_preim_sum")->nullable();
            $table->string("passenger_quantity")->nullable();
            $table->string("passenger_one_sum")->nullable();
            $table->string("passenger_currency")->nullable();
            $table->string("passenger_total_sum")->nullable();
            $table->string("passenger_preim_sum")->nullable();
            $table->string("limit_quantity")->nullable();
            $table->string("limit_one_sum")->nullable();
            $table->string("limit_currency")->nullable();
            $table->string("limit_total_sum")->nullable();
            $table->string("limit_preim_sum")->nullable();
            $table->string("total_liability_limit")->nullable();
            $table->string("total_liability_limit_currency")->nullable();
            $table->string("other_form_policy")->nullable();
            $table->string("other_from_date")->nullable();
            $table->string("other_agent")->nullable();
            $table->string("other_payment")->nullable();
            $table->string("payment_order")->nullable();
            $table->string("other_totally_sum")->nullable();
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
        Schema::dropIfExists('borrower_sportsman_others');
    }
}
