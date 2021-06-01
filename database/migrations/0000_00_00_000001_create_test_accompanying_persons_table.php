<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestAccompanyingPersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accompanying_persons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_cargo_id')->unsigned();
            $table->string('fio', 45);
            $table->string('position', 45);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('contract_cargo_id', 'fk_accompanying_person_contract_cargo')->references('id')->on('contract_cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accompanying_persons');
    }
}
