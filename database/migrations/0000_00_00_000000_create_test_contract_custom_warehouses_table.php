<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractCustomWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_custom_warehouses', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('measure', ['liter', 'ton', 'unit']);
            $table->float('square', 32, 2)->unsigned();
            $table->float('capacity', 32, 2)->unsigned();
            $table->float('sum', 32, 2)->unsigned();
            $table->date('goods_period_from');
            $table->date('goods_period_to');
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
        Schema::dropIfExists('contract_custom_warehouses');
    }
}
