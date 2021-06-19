<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractFastPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_fast_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->date('period_from');
            $table->date('period_to');
            $table->enum('usage_basement', ['techpassport', 'proxy', 'leasing', 'waybill']);
            $table->string('geo_zone', 45);
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
        Schema::dropIfExists('contract_fast_payments');
    }
}
