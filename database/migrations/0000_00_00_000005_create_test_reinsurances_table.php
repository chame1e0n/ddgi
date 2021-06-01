<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestReinsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reinsurances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('policy_id')->unsigned();
            $table->string('comments')->nullable();
            $table->string('file_path')->nullable();
            $table->string('state')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('employee_id', 'fk_reinsurance_employee')->references('id')->on('employees');
            $table->foreign('policy_id', 'fk_reinsurance_policy')->references('id')->on('policies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reinsurances');
    }
}
