<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestPolicyFastPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policy_fast_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('issue_year')->unsigned();
            $table->string('brand', 100);
            $table->string('model', 100);
            $table->string('government_number', 45);
            $table->string('techpassport_number', 45);
            $table->string('engine_number', 45);
            $table->string('carcase_number', 45);
            $table->string('carrying_capacity', 45);
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
        Schema::dropIfExists('policy_fast_payments');
    }
}
