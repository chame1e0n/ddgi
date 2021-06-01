<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractGuaranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_guarantees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contragent_id')->unsigned();
            $table->string('loan_agreement');
            $table->date('period_from');
            $table->date('period_to');
            $table->date('waiting_from')->nullable();
            $table->date('waiting_to')->nullable();
            $table->string('other_information')->nullable();
            $table->float('sum', 12, 3)->unsigned()->nullable();
            $table->string('purpose')->nullable();
            $table->string('other_security_forms')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('contragent_id', 'fk_contract_guarantee_contragent')->references('id')->on('contragents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_guarantees');
    }
}
