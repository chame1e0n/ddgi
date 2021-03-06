<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('policy_id')->unsigned()->nullable();
            $table->enum('status', ['defective', 'cancelling', 'lost', 'terminated', 'policy_transfer', 'underwriting'])->nullable();
            $table->tinyInteger('is_underwriting_request')->unsigned()->default(0);
            $table->tinyInteger('is_reinsurance_request')->unsigned()->default(0);
            $table->text('comment')->nullable();
            $table->string('act_number', 200)->nullable();
            $table->string('limit_reason', 200)->nullable();
            $table->integer('policy_amount')->unsigned()->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('employee_id', 'fk_request_employee')->references('id')->on('employees');
            $table->foreign('policy_id', 'fk_request_policy')->references('id')->on('policies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
