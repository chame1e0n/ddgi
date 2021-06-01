<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestNotaryEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notary_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_notary_id')->unsigned();
            $table->integer('number')->unsigned();
            $table->string('administrator', 45);
            $table->string('composition', 45);
            $table->string('other', 45);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('contract_notary_id', 'fk_notary_employee_contract_notary')->references('id')->on('contract_notaries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notary_employees');
    }
}
