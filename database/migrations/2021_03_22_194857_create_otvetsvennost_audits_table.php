<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtvetsvennostAuditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('otvetsvennost_audits', function (Blueprint $table) {
//            $table->id();
//            $table->unsignedBigInteger("policy_holder_id");
////            $table->foreign('policy_holder_id')
////                ->references('id')->on('policy_holders');
//            $table->unsignedBigInteger("audit_turnover_id");
//            $table->foreign('audit_turnover_id')
//                ->references('id')
//                ->on('audit_turnovers');
//            $table->date("insurance_from")->nullable();
//            $table->date("insurance_to")->nullable();
//            $table->string("geo_zone")->nullable();
//            $table->date("active_period_from")->nullable();
//            $table->date("active_period_to")->nullable();
//            $table->string("questionnaire")->nullable();
//            $table->string("contract")->nullable();
//            $table->string("policy_file")->nullable();
//            $table->string("polis_series")->nullable();
//            $table->string("polis_from")->nullable();
//            $table->string('litso')->nullable();
//            $table->string('insurance_premium_currency')->nullable();
//            $table->string('payment_term')->nullable();
//            $table->string('all_sum')->nullable();
//            $table->string('franchise')->nullable();
//            $table->string('insurance_bonus')->nullable();
//
//            $table->string('payment_sum_main')->nullable();
//            $table->string('payment_from_main')->nullable();
//
//            $table->string('acted')->nullable();
//            $table->string('public_sector_comment')->nullable();
//            $table->string('private_sector_comment')->nullable();
//            $table->string('risk')->nullable();
//            $table->string("cases")->nullable();
//            $table->string("reason_case")->nullable();
//            $table->string("administrative_case")->nullable();
//            $table->string("reason_administrative_case")->nullable();
//            $table->string("sphere_of_activity")->nullable();
//            $table->string("prof_insurance_services")->nullable();
//            $table->string("liability_limit")->nullable();
//            $table->string("retransfer_akt_file")->nullable();
//
//            $table->string('number_polis_main')->nullable();
//            $table->string('series_polis_main')->nullable();
//            $table->date('validity_period_from_main')->nullable();
//            $table->date('validity_period_to_main')->nullable();
//            $table->string('polis_agent_main')->nullable();
//            $table->string('polis_mark_main')->nullable();
//            $table->string('specialty_main')->nullable();
//            $table->string('workExp_main')->nullable();
//            $table->string('polis_model_main')->nullable();
//            $table->string('arriving_time_main')->nullable();
//            $table->string('cost_of_insurance_main')->nullable();
//            $table->string('sum_of_insurance_main')->nullable();
//            $table->string('bonus_of_insurance_main')->nullable();
//
//            $table->timestamps();
//            $table->softDeletes();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otvetsvennost_audits');
    }
}
