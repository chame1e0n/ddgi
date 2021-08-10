<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPolicyEvaluatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_evaluators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fio', 45);
            $table->string('speciality', 45);
            $table->string('work_experience', 45);
            $table->string('position', 45);
            $table->string('start_date', 45);
            $table->float('insurance_value', 12, 3)->unsigned();
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
        Schema::dropIfExists('policy_evaluators');
    }
}
