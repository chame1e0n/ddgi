<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractAuditorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_auditors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('geo_zone');
            $table->integer('annual_turnover_first_year')->unsigned();
            $table->float('annual_turnover_first_money', 32, 2)->unsigned();
            $table->float('annual_turnover_first_earnings', 32, 2)->unsigned();
            $table->integer('annual_turnover_second_year')->unsigned();
            $table->float('annual_turnover_second_money', 32, 2)->unsigned();
            $table->float('annual_turnover_second_earnings', 32, 2)->unsigned();
            $table->date('activity_period_from');
            $table->date('activity_period_to')->nullable();
            $table->text('activity_in_goverment_sector')->nullable();
            $table->text('activity_in_private_sector')->nullable();
            $table->string('personal_activity_risk')->nullable();
            $table->text('claim_filing_reason')->nullable();
            $table->text('administrative_penalty_filing_reason')->nullable();
            $table->enum('professional_activity_insurance', ['bank_audit', 'organization_audit', 'exchange_audit', 'general_audit'])->nullable();
            $table->enum('professional_service_insurance', ['accounting_restoration', 'reporting', 'reporting_translation', 'activity_analysis', 'consulting', 'calculation_compilation'])->nullable();
            $table->enum('required_responsibility_limit', ['annual', 'insured_event'])->nullable();
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
        Schema::dropIfExists('contract_auditors');
    }
}
