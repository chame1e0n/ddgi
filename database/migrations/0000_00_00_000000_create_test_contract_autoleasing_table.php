<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractAutoleasingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_autoleasing', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loan_agreement', 45);
            $table->date('period_from');
            $table->date('period_to');
            $table->date('validity_from');
            $table->date('validity_to');
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
        Schema::dropIfExists('contract_autoleasing');
    }
}
