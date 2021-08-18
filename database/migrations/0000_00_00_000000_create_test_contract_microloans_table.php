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
            $table->date('credit_agreement_date');
            $table->date('microloan_from');
            $table->date('microloan_to');
            $table->date('waiting_from')->nullable();
            $table->date('waiting_to')->nullable();
            $table->float('microloan_sum', 32, 2)->unsigned();
            $table->string('purpose')->nullable();
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
