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
            $table->integer('from_employee_id')->unsigned();
            $table->integer('policy_id')->unsigned();
            $table->integer('to_employee_id')->unsigned();
            $table->date('act_date');
            $table->enum('status', ['registered', 'pending_transfer', 'rejected_transfer', 'transferred', 'retransferred']);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('from_employee_id', 'fk_policy_flow_employee_2')->references('id')->on('employees');
            $table->foreign('policy_id', 'fk_policy_flow_policy')->references('id')->on('policies');
            $table->foreign('to_employee_id', 'fk_policy_flow_employee_3')->references('id')->on('employees');
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
