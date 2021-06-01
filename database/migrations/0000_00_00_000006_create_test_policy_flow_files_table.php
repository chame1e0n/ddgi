<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPolicyFlowFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_flow_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('policy_flow_id')->unsigned();
            $table->string('path');
            $table->timestamps();
            $table->foreign('policy_flow_id', 'fk_policy_flow_file_policy_flow')->references('id')->on('policy_flows');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('policy_flow_files');
    }
}
