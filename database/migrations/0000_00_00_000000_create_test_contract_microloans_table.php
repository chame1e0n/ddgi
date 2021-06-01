<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractMicroloansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_microloans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('insurance_agreement_number', 45);
            $table->date('insurance_agreement_date');
            $table->string('credit_agreement_number', 45);
            $table->date('credit_agreement_date');
            $table->date('microloan_from');
            $table->date('microloan_to');
            $table->date('waiting_from')->nullable();
            $table->date('waiting_to')->nullable();
            $table->float('microloan_sum', 12, 3)->unsigned();
            $table->string('purpose')->nullable();
            $table->date('validity_from');
            $table->date('validity_to');
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
        Schema::dropIfExists('contract_microloans');
    }
}
