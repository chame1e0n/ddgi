<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPoliciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_id')->unsigned()->nullable();
            $table->integer('employee_id')->unsigned();
            $table->string('name', 100);
            $table->string('number', 50)->nullable();
            $table->integer('series')->unsigned();
            $table->string('act_number', 50);
            $table->enum('print_size', ['a4', 'a5']);
            $table->float('price', 32, 2)->unsigned();
            $table->string('status', 45);
            $table->date('polis_from_date')->nullable();
            $table->date('polis_to_date')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->float('insurance_sum', 32, 2)->unsigned()->nullable();
            $table->float('franchise', 32, 2)->unsigned()->nullable();
            $table->nullableMorphs('model');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('contract_id', 'fk_policy_contract')->references('id')->on('contracts');
            $table->foreign('employee_id', 'fk_policy_employee')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policies');
    }
}
