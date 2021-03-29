<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtvetstvennostNatariusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otvetstvennost_natarius', function (Blueprint $table) {
            $table->id();
            $table->text('info_personal')->nullable();
            $table->date('insurance_from')->nullable();
            $table->date('insurance_to')->nullable();
            $table->text('geo_zone')->nullable();
            $table->json('year')->nullable();
            $table->json('turnover')->nullable();
            $table->json('earnings')->nullable();
            $table->date('activity_period_from')->nullable();
            $table->date('activity_period_to')->nullable();
            $table->boolean('acted')->nullable();
            $table->text('public_sector_comment')->nullable();
            $table->text('private_sector_comment')->nullable();
            $table->text('riski')->nullable();
            $table->text('other_insurance_0')->nullable();
            $table->text('reason_case')->nullable();
            $table->boolean('administrative_case')->nullable();
            $table->text('reason_administrative_case')->nullable();
            $table->text('sphereOfActivity')->nullable();
            $table->text('profInsuranceServices')->nullable();
            $table->text('retransferAktFile')->nullable();
            $table->text('wallet')->nullable();
            $table->text('sum_insured')->nullable();
            $table->text('franchise')->nullable();
            $table->text('insurance_premium')->nullable();
            $table->text('polis_series')->nullable();
            $table->text('insurance_policy_from')->nullable();
            $table->text('anketaFile')->nullable();
            $table->text('dogovorFile')->nullable();
            $table->text('polisFile')->nullable();
            $table->text('litso')->nullable();
            $table->text('payment_term')->nullable();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('otvetstvennost_natarius');
    }
}
