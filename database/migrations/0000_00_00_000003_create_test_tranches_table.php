<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestTranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tranches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_id')->unsigned();
            $table->float('sum', 32, 2)->unsigned();
            $table->date('from');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('contract_id', 'fk_tranche_contract')->references('id')->on('contracts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tranches');
    }
}
