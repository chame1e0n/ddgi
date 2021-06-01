<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractLeasingAutocreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_leasing_autocredits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loan_agreement');
            $table->date('period_from');
            $table->date('period_to');
            $table->date('validity_from')->nullable();
            $table->date('validity_to')->nullable();
            $table->float('sum', 12, 3)->unsigned()->nullable();
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
        Schema::dropIfExists('contract_leasing_autocredits');
    }
}
