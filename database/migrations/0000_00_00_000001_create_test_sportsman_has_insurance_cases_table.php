<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestSportsmanHasInsuranceCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sportsman_has_insurance_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_sportsman_id')->unsigned();
            $table->integer('insurance_case_id')->unsigned();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('contract_sportsman_id', 'fk_sportsman_has_insurance_case_contract_sportsman')->references('id')->on('contract_sportmans');
            $table->foreign('insurance_case_id', 'fk_sportsman_has_insurance_case_insurance_case')->references('id')->on('insurance_cases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sportsman_has_insurance_cases');
    }
}
