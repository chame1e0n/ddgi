<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestContractCarAccidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_car_accidents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->float('sum', 32, 2)->unsigned()->nullable();
            $table->float('premium', 32, 2)->unsigned()->nullable();
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
        Schema::dropIfExists('contract_car_accidents');
    }
}
