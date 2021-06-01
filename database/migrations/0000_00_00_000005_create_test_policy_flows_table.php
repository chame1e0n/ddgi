<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPolicyFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_flows', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id')->unsigned()->nullable();
            $table->integer('from_employee_id')->unsigned()->nullable();
            $table->integer('policy_given_by_employee_id')->unsigned()->nullable();
            $table->integer('policy_id')->unsigned()->nullable();
            $table->integer('to_employee_id')->unsigned()->nullable();
            $table->string('act_number', 50);
            $table->date('act_date');
            $table->enum('status', ['registered', 'pending_transfer', 'rejected_transfer', 'transferred', 'retransferred']);
            $table->string('polis_name', 100)->nullable();
            $table->float('price_per_policy', 12, 3)->unsigned()->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('branch_id', 'fk_policy_flow_branch')->references('id')->on('branches');
            $table->foreign('policy_given_by_employee_id', 'fk_policy_flow_employee_1')->references('id')->on('employees');
            $table->foreign('from_employee_id', 'fk_policy_flow_employee_2')->references('id')->on('employees');
            $table->foreign('to_employee_id', 'fk_policy_flow_employee_3')->references('id')->on('employees');
            $table->foreign('policy_id', 'fk_policy_flow_policy')->references('id')->on('policies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policy_flows');
    }
}
