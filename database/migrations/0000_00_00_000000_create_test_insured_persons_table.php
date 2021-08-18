<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestInsuredPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insured_persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fio', 250);
            $table->string('address', 150);
            $table->string('phone', 50);
            $table->string('passport_series');
            $table->string('passport_number');
            $table->float('sum', 32, 2)->unsigned()->nullable();
            $table->float('tariff', 4, 2)->unsigned()->nullable();
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
        Schema::dropIfExists('insured_persons');
    }
}
